<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;

class DashboardController extends Controller
{
    public function index()
    {
        $players = Player::all();
        $quantidadeJogadoresConfirmados = $players->where('confirmed', 1)->count();
        $quantidadeGoleiros = $players->where('goalkeeper', 1)->count();

        $data = [
            "title" => 'Dashboard',
            "players" => $players->count(),
            "quantidadeJogadoresConfirmados" => $quantidadeJogadoresConfirmados,
            "quantidadeGoleiros" => $quantidadeGoleiros,
        ];

        return view('admin.dashboard', $data);
    }
}
