<?php

namespace Database\Factories\Infra\Models;

use Infra\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'birthday' => $this->faker->date(),
            'opening_balance' => $this->faker->numerify("#####.###")
        ];
    }
}
