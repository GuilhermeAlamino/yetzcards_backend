<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Notifications\UserRegisteredNotification;

class UserController extends Controller
{

    public function index()
    {

        $users = User::with('role')->paginate(10);

        return view('admin.user.index', ["users" => $users]);
    }

    public function show($id)
    {

        $user = User::where('id', $id)->first();

        return view('admin.user.show', ["user" => $user]);
    }

    public function create()
    {

        return view('admin.user.store');
    }


    public function store(UserStoreRequest $request)
    {

        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        $user->notify(new UserRegisteredNotification());

        return redirect()->route('dashboard.user.create')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->first();

        return view('admin.user.update', ["user" => $user]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $validatedData = $request->validated();

        $user->update($validatedData);

        return redirect()->route('dashboard.user.edit', $id)->with('success', 'Usúario atualizado com sucesso!');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('dashboard.user.index', $id)->with('success-delete', 'Usúario deletado com sucesso!');
    }
}
