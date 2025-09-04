<?php

namespace Database\Factories;

use App\Models\Notes;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotesFactory extends Factory
{
    protected $model = Notes::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
