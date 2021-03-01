<?php

namespace Database\Factories\Infra\Models;

use Infra\Models\Movement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Infra\Models\User;

class MovementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(["debit", "credit", "reversal"]),
            'value' => $this->faker->numerify("#####.###"),
            'user_id' => User::select("id")->inRandomOrder()->first()
        ];
    }
}
