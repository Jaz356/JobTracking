<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'company' => $this-> faker -> company(),
            'workapply' => $this-> faker -> jobTitle(),
            'status' => $this-> faker -> randomElement(["completed","in progress"]),
            'url' => $this-> faker -> url(),
        ];
    }
}
