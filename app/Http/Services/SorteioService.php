<?php

namespace App\Http\Services;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class SorteioService
{
  public function sortearTimes()
  {
    $limitePorTime = Auth::user()->limit_per_team;
    $quantidadeJogadores = $limitePorTime * 2;

    // verifica se tem limite por time
    if ($limitePorTime == 0) {
      return ["error" => "Não existe limite de jogadores por time :/ !"];
    }

    $jogadoresConfirmados = Player::where('confirmed', 1)->get();

    // verifica se tem pelo menos 2 times completos confirmados
    if ($jogadoresConfirmados->count() < $quantidadeJogadores) {
      return ["error" => "Não existe 2 times completos confirmados :( !"];
    }

    // Separe os jogadores em goleiros e jogadores de campo
    $goleiros = $jogadoresConfirmados->where('goalkeeper', 1);
    $jogadoresCampo = $jogadoresConfirmados->where('goalkeeper', 0);

    // Garanta que há pelo menos 2 goleiro
    if ($goleiros->count() < 2) {
      return ["error" => "Não existe a quantidade certa de goleiros para cada time :("];
    }

    // Embaralha os goleiros
    $goleirosEmbaralhados = $goleiros->shuffle();

    // Embaralha os jogadores de campo
    $jogadoresCampoEmbaralhados = $jogadoresCampo->shuffle();

    // Garante que há pelo menos 2 goleiros
    if ($goleirosEmbaralhados->count() < 2) {
      return ["error" => "Não existe a quantidade certa de goleiros para cada time :("];
    }

    // Divide os jogadores de campo em dois grupos
    $metadeJogadores = $jogadoresCampoEmbaralhados->count() / 2;
    $grupo1 = $jogadoresCampoEmbaralhados->take($metadeJogadores);
    $grupo2 = $jogadoresCampoEmbaralhados->slice($metadeJogadores);

    // Adiciona jogadores aos times respeitando o limite
    $time1 = collect([$goleirosEmbaralhados->first()])->concat($grupo1->take($limitePorTime - 1));
    $time2 = collect([$goleirosEmbaralhados->last()])->concat($grupo2->take($limitePorTime - 1));

    // Verifica se há goleiros ou jogadores repetidos nos times
    if ($time1->pluck('id')->intersect($time2->pluck('id'))->isNotEmpty()) {
      return ["error" => "Existe goleiros ou jogadores repetidos nos time :/"];
    }

    if (Auth::user()->balancing == 1) {
      // Balanceia os times com base no nível dos jogadores
      $time1 = $this->balancearTimesPorNivel($time1);
      $time2 = $this->balancearTimesPorNivel($time2);

      return ["time1" => $time1, "time2" => $time2];
    }

    return ["time1" => $time1, "time2" => $time2];
  }

  // Função para balancear os times por nível
  private function balancearTimesPorNivel($time)
  {
    $nivelMedio = $time->avg('nivel');

    // Ordena os jogadores por proximidade ao nível médio
    $time = $time->sortBy(function ($jogador) use ($nivelMedio) {
      return abs($jogador['nivel'] - $nivelMedio);
    });

    return $time;
  }
}
