<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SantriFactory extends Factory
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
        $name = 'Santri ' . $this->faker->unique()->numberBetween(1, 100);
        $email = str_replace(' ', '_', strtolower($name)) . '@gmail.com';

        return [
            'name' => $name,
            'role' => 'Santri',
            'nik' => $this->faker->unique()->randomNumber(8),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'email' => $email,
            'password' => bcrypt('password'), // Default password
        ];
    }
}
