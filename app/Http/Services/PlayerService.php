<?php

namespace App\Http\Services;

use App\Models\Player;

class PlayerService
{
  public function createPlayers(array $playerData)
  {
    try {
      foreach ($playerData['name'] as $index => $name) {
        Player::create([
          'name' => $name,
          'nivel' => $playerData['nivel'][$index],
          'goalkeeper' => $playerData['goalkeeper'][$index],
          'confirmed' => $playerData['confirmed'][$index],
        ]);
      }

      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
}
