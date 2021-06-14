<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Player;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::query()->delete();
        foreach(Player::all() as $player) {
            $numGames = rand(20,50);
            foreach(range(1,$numGames) as $num) {
                $game = Game::factory()->make(['game_number' => $num, 'player_id' => $player->id]);
                $player->games()->save($game);
            }
        }
    }
}
