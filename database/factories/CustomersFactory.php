<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $table->id();
        //            $table->string('name');
        //            $table->string('email')->unique();
        //            $table->string('phone_number');
        //            $table->timestamps();
        return array(
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' =>fake()->phoneNumber,
        );
    }
}
