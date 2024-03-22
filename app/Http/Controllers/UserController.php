<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->user->create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Usuário criado com sucesso');
        } else {
            return redirect()->back()->with('message', 'Erro ao criar usuário');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $update = $user->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->with('message', 'Atualizado com sucesso');
        }
        return redirect()->back()->with('message', 'Erro ao atualizar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted=$this->user->where('id', $id )->delete();
        if($deleted){
            return redirect()->route('users.index');
        }

        
    }
}


