<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Services\DemoDataService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = DemoDataService::getClients();
        
        // Filtros
        $search = $request->get('search');
        $status = $request->get('status');
        
        if ($search) {
            $clients = $clients->filter(function ($client) use ($search) {
                return stripos($client['name'], $search) !== false || 
                       stripos($client['email'], $search) !== false ||
                       stripos($client['company'], $search) !== false;
            });
        }
        
        if ($status) {
            $clients = $clients->where('status', $status);
        }
        
        return view('demo.clients.index', compact('clients', 'search', 'status'));
    }
    
    public function create()
    {
        return view('demo.clients.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'notes' => 'nullable|string'
        ]);
        
        $client = DemoDataService::addClient($request->all());
        
        return redirect()->route('demo.clients.index')
                        ->with('success', 'Cliente criado com sucesso!');
    }
    
    public function show($id)
    {
        $clients = DemoDataService::getClients();
        $client = $clients->firstWhere('id', $id);
        
        if (!$client) {
            return redirect()->route('demo.clients.index')
                           ->with('error', 'Cliente não encontrado!');
        }
        
        return view('demo.clients.show', compact('client'));
    }
    
    public function edit($id)
    {
        $clients = DemoDataService::getClients();
        $client = $clients->firstWhere('id', $id);
        
        if (!$client) {
            return redirect()->route('demo.clients.index')
                           ->with('error', 'Cliente não encontrado!');
        }
        
        return view('demo.clients.edit', compact('client'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'notes' => 'nullable|string'
        ]);
        
        $client = DemoDataService::updateClient($id, $request->all());
        
        if (!$client) {
            return redirect()->route('demo.clients.index')
                           ->with('error', 'Cliente não encontrado!');
        }
        
        return redirect()->route('demo.clients.show', $id)
                        ->with('success', 'Cliente atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        $deleted = DemoDataService::deleteClient($id);
        
        if (!$deleted) {
            return redirect()->route('demo.clients.index')
                           ->with('error', 'Cliente não encontrado!');
        }
        
        return redirect()->route('demo.clients.index')
                        ->with('success', 'Cliente excluído com sucesso!');
    }
    
    public function export($id)
    {
        $clients = DemoDataService::getClients();
        $client = $clients->firstWhere('id', $id);
        
        if (!$client) {
            return redirect()->route('demo.clients.index')
                           ->with('error', 'Cliente não encontrado!');
        }
        
        // Simular exportação
        return redirect()->route('demo.clients.show', $id)
                        ->with('success', 'Dados do cliente exportados com sucesso!');
    }
}