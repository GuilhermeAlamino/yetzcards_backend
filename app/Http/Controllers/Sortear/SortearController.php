<?php

namespace App\Http\Controllers\Sortear;

use App\Http\Controllers\Controller;
use App\Http\Services\SorteioService;
use App\Models\Player;
use Illuminate\Http\Request;

class SortearController extends Controller
{
    protected $sorteioService;

    public function __construct(SorteioService $sorteioService)
    {
        $this->sorteioService = $sorteioService;
    }

    public function sortear()
    {
        $players = Player::all();
        $quantidadeJogadoresConfirmados = $players->where('confirmed', 1)->count();
        $quantidadeGoleiros = $players->where('goalkeeper', 1)->count();

        $timesSorteados = $this->sorteioService->sortearTimes();

        if (isset($timesSorteados['error'])) return redirect()->route('dashboard.index')->with('error', $timesSorteados['error']);

        return view('admin.dashboard', ["players" => $players->count(), "quantidadeGoleiros" => $quantidadeGoleiros, "quantidadeJogadoresConfirmados" => $quantidadeJogadoresConfirmados, "time1" => $timesSorteados['time1'], "time2" => $timesSorteados['time2']]);
    }
}
