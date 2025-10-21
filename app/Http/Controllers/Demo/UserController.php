<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Services\DemoDataService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DemoDataService::getUsers();
        
        // Filtros
        $search = $request->get('search');
        $role = $request->get('role');
        $status = $request->get('status');
        
        if ($search) {
            $users = $users->filter(function ($user) use ($search) {
                return stripos($user['name'], $search) !== false || 
                       stripos($user['email'], $search) !== false;
            });
        }
        
        if ($role) {
            $users = $users->where('role', $role);
        }
        
        if ($status) {
            $users = $users->where('status', $status);
        }
        
        return view('demo.users.index', compact('users', 'search', 'role', 'status'));
    }
    
    public function create()
    {
        return view('demo.users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:admin,moderator,user',
            'status' => 'required|in:active,inactive'
        ]);
        
        $user = DemoDataService::addUser($request->all());
        
        return redirect()->route('demo.users.index')
                        ->with('success', 'Usuário criado com sucesso!');
    }
    
    public function show($id)
    {
        $users = DemoDataService::getUsers();
        $user = $users->firstWhere('id', $id);
        
        if (!$user) {
            return redirect()->route('demo.users.index')
                           ->with('error', 'Usuário não encontrado!');
        }
        
        return view('demo.users.show', compact('user'));
    }
    
    public function edit($id)
    {
        $users = DemoDataService::getUsers();
        $user = $users->firstWhere('id', $id);
        
        if (!$user) {
            return redirect()->route('demo.users.index')
                           ->with('error', 'Usuário não encontrado!');
        }
        
        return view('demo.users.edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:admin,moderator,user',
            'status' => 'required|in:active,inactive'
        ]);
        
        $user = DemoDataService::updateUser($id, $request->all());
        
        if (!$user) {
            return redirect()->route('demo.users.index')
                           ->with('error', 'Usuário não encontrado!');
        }
        
        return redirect()->route('demo.users.show', $id)
                        ->with('success', 'Usuário atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        $deleted = DemoDataService::deleteUser($id);
        
        if (!$deleted) {
            return redirect()->route('demo.users.index')
                           ->with('error', 'Usuário não encontrado!');
        }
        
        return redirect()->route('demo.users.index')
                        ->with('success', 'Usuário excluído com sucesso!');
    }
    
    public function toggleStatus($id)
    {
        $users = DemoDataService::getUsers();
        $user = $users->firstWhere('id', $id);
        
        if (!$user) {
            return redirect()->route('demo.users.index')
                           ->with('error', 'Usuário não encontrado!');
        }
        
        $newStatus = $user['status'] === 'active' ? 'inactive' : 'active';
        DemoDataService::updateUser($id, array_merge($user, ['status' => $newStatus]));
        
        $statusText = $newStatus === 'active' ? 'ativado' : 'desativado';
        
        return redirect()->route('demo.users.show', $id)
                        ->with('success', "Usuário {$statusText} com sucesso!");
    }
}