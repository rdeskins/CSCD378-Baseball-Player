<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $atBats = $this->faker->numberBetween(1,5);
        $hits = $this->faker->numberBetween(0, $atBats);
        $rbi = 0;
        if ($hits != 0) {
            $rbi = $this->faker->numberBetween(0, $hits);
        }
        return [
            'game_number' => $this->faker->numberBetween(1,162),
            'at_bats' => $atBats,
            'runs' => $this->faker->numberBetween(0, $atBats),
            'hits' => $hits,
            'walks' => $this->faker->numberBetween(0,3),
            'runs_batted_in' => $rbi,
        ];
    }
}
