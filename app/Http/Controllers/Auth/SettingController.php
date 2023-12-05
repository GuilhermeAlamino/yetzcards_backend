<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{

  public function index()
  {

    $settings = User::where('id', Auth::user()->id)->first();

    return view('admin.settings.index', ['settings' => $settings]);
  }

  public function update(SettingUpdateRequest $request)
  {

    $user = Auth::user();

    $user->update($request->validated());

    return redirect()->route('dashboard.user.settings.index')->with('success', 'Configurações atualizado com sucesso!');
  }
}
