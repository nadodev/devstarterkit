<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Services\DemoDataService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::with(['assignedUser', 'creator', 'project']);
        
        // Filtros
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }
        
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        $tasks = $query->orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(20);
        
        $users = User::whereIn('role', ['admin', 'moderator', 'user'])->get();
        
        return view('demo.tasks.index', compact('tasks', 'users'));
    }
    
    public function create(Request $request)
    {
        $users = User::whereIn('role', ['admin', 'moderator', 'user'])->get();
        
        // Buscar projetos cadastrados no sistema demo
        $projects = DemoDataService::getProjects();
        
        // Se veio de um projeto específico, pré-selecionar
        $selectedProject = $request->get('project_id');
        
        return view('demo.tasks.create', compact('users', 'projects', 'selectedProject'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'due_date' => 'nullable|date|after:today',
            'project_id' => 'nullable|exists:users,id',
            'assigned_to' => 'nullable|exists:users,id',
            'notes' => 'nullable|string'
        ]);
        
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'project_id' => $request->project_id,
            'assigned_to' => $request->assigned_to,
            'created_by' => 1, // Admin demo
            'notes' => $request->notes
        ]);
        
        return redirect()->route('demo.tasks.index')
                        ->with('success', 'Tarefa criada com sucesso!');
    }
    
    public function show(Task $task)
    {
        $task->load(['assignedUser', 'creator', 'project']);
        return view('demo.tasks.show', compact('task'));
    }
    
    public function edit(Task $task)
    {
        $users = User::whereIn('role', ['admin', 'moderator', 'user'])->get();
        
        // Buscar apenas clientes que têm tarefas associadas ou todos os clientes
        $projects = DemoDataService::getProjects();
        return view('demo.tasks.edit', compact('task', 'users', 'projects'));
    }
    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'due_date' => 'nullable|date',
            'project_id' => 'nullable|exists:users,id',
            'assigned_to' => 'nullable|exists:users,id',
            'notes' => 'nullable|string'
        ]);
        
        $task->update($request->all());
        
        return redirect()->route('demo.tasks.show', $task)
                        ->with('success', 'Tarefa atualizada com sucesso!');
    }
    
    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('demo.tasks.index')
                        ->with('success', 'Tarefa excluída com sucesso!');
    }
    
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled'
        ]);
        
        $task->update(['status' => $request->status]);
        
        return response()->json([
            'success' => true,
            'message' => 'Status da tarefa atualizado com sucesso!',
            'task' => $task->fresh()
        ]);
    }
    
    public function updatePriority(Request $request, Task $task)
    {
        $request->validate([
            'priority' => 'required|in:low,medium,high,urgent'
        ]);
        
        $task->update(['priority' => $request->priority]);
        
        return response()->json([
            'success' => true,
            'message' => 'Prioridade da tarefa atualizada com sucesso!',
            'task' => $task->fresh()
        ]);
    }
    
    public function assign(Request $request, Task $task)
    {
        $request->validate([
            'assigned_to' => 'required|exists:users,id'
        ]);
        
        $task->update(['assigned_to' => $request->assigned_to]);
        
        return response()->json([
            'success' => true,
            'message' => 'Tarefa atribuída com sucesso!',
            'task' => $task->fresh(['assignedUser'])
        ]);
    }
}