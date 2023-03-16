<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'company' => $this->faker->company,
            'email' => $this->faker->email,
            'birthday' => $this->faker->date,
            'photo' => $this->faker->filePath(),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
