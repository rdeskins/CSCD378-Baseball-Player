<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;


class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($this->faker);
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'team' => $this->faker->team,
            'jersey_number' => $this->faker->randomDigit() . "" . $this->faker->randomDigit(),
            'position' => $this->randomPosition(),
            'age' => $this->faker->numberBetween(1,100)
        ];
    }

    private function randomPosition()
    {
        $position = ['P', 'C', '1B', '2B', '3B', 'SS', 'LF', 'CF', 'RF'];
        $num = $this->faker->numberBetween(0,8);
        return $position[$num];
    }
}
