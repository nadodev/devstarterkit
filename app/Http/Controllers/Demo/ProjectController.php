<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Services\DemoDataService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = DemoDataService::getProjects();
        
        // Filtros
        $search = $request->get('search');
        $status = $request->get('status');
        
        if ($search) {
            $projects = $projects->filter(function ($project) use ($search) {
                return stripos($project['name'], $search) !== false || 
                       stripos($project['client'], $search) !== false;
            });
        }
        
        if ($status) {
            $projects = $projects->where('status', $status);
        }
        
        return view('demo.projects.index', compact('projects', 'search', 'status'));
    }
    
    public function create()
    {
        $clients = DemoDataService::getClients();
        return view('demo.projects.create', compact('clients'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'status' => 'required|in:active,completed,pending',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'progress' => 'nullable|integer|min:0|max:100'
        ]);
        
        $project = DemoDataService::addProject($request->all());
        
        return redirect()->route('demo.projects.index')
                        ->with('success', 'Projeto criado com sucesso!');
    }
    
    public function show($id)
    {
        $projects = DemoDataService::getProjects();
        $project = $projects->firstWhere('id', $id);
        
        if (!$project) {
            return redirect()->route('demo.projects.index')
                           ->with('error', 'Projeto não encontrado!');
        }
        
        // Buscar tarefas reais do banco de dados para este projeto
        $projectTasks = \App\Models\Task::where('project_id', $id)
                                       ->with(['assignedUser', 'creator'])
                                       ->orderBy('created_at', 'desc')
                                       ->get();
        
        return view('demo.projects.show', compact('project', 'projectTasks'));
    }
    
    public function edit($id)
    {
        $projects = DemoDataService::getProjects();
        $project = $projects->firstWhere('id', $id);
        
        if (!$project) {
            return redirect()->route('demo.projects.index')
                           ->with('error', 'Projeto não encontrado!');
        }
        
        $clients = DemoDataService::getClients();
        return view('demo.projects.edit', compact('project', 'clients'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'status' => 'required|in:active,completed,pending',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'progress' => 'nullable|integer|min:0|max:100'
        ]);
        
        $project = DemoDataService::updateProject($id, $request->all());
        
        if (!$project) {
            return redirect()->route('demo.projects.index')
                           ->with('error', 'Projeto não encontrado!');
        }
        
        return redirect()->route('demo.projects.show', $id)
                        ->with('success', 'Projeto atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        $deleted = DemoDataService::deleteProject($id);
        
        if (!$deleted) {
            return redirect()->route('demo.projects.index')
                           ->with('error', 'Projeto não encontrado!');
        }
        
        return redirect()->route('demo.projects.index')
                        ->with('success', 'Projeto excluído com sucesso!');
    }
    
    public function export($id)
    {
        $projects = DemoDataService::getProjects();
        $project = $projects->firstWhere('id', $id);
        
        if (!$project) {
            return redirect()->route('demo.projects.index')
                           ->with('error', 'Projeto não encontrado!');
        }
        
        // Simular exportação
        return redirect()->route('demo.projects.show', $id)
                        ->with('success', 'Relatório do projeto exportado com sucesso!');
    }
}