<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Http\Services\PlayerService;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function index()
    {

        $players = Player::paginate(10);

        return view('admin.player.index', ["players" => $players]);
    }

    public function show($id)
    {

        $player = Player::where('id', $id)->first();

        return view('admin.player.show', ["player" => $player]);
    }

    public function create()
    {

        return view('admin.player.store');
    }


    public function store(PlayerStoreRequest $request)
    {

        $validatedData = $request->validated();

        $result = $this->playerService->createPlayers($validatedData);

        if ($result) {
            return redirect()->route('dashboard.player.create')->with('success', 'Jogador(es) criado(s) com sucesso!');
        }

        return redirect()->route('dashboard.player.create')->withErrors('Falha ao criar jogador(es).');
    }

    public function edit($id)
    {

        $player = Player::where('id', $id)->first();

        return view('admin.player.update', ["player" => $player]);
    }

    public function update(PlayerUpdateRequest $request, $id)
    {
        $player = Player::find($id);

        $validatedData = $request->validated();

        $player->update($validatedData);

        return redirect()->route('dashboard.player.edit', $id)->with('success', 'Jogador atualizado com sucesso!');
    }

    public function delete($id)
    {
        $player = Player::find($id);

        $player->delete();

        return redirect()->route('dashboard.player.index', $id)->with('success-delete', 'Jogador deletado com sucesso!');
    }
}
