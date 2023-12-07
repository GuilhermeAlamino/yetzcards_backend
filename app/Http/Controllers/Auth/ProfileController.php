<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

  public function show()
  {

    $user = Auth::user();

    return view('admin.auth.profile.show', ["user" => $user]);
  }

  public function update(ProfileUpdateRequest $request)
  {

    $user = Auth::user();

    $validatedData = $request->validated();

    $user->update($validatedData);

    return redirect()->route('dashboard.profile.show')->with('success', 'Perfil atualizado com sucesso!');
  }
}
