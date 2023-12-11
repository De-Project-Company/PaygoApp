<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

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
        //            $table->string('business_name');
        //            $table->timestamp('email_verified_at')->nullable();
        //            $table->string('password');
        //            $table->rememberToken();
        //            $table->timestamps();
        return array(
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' =>fake()->phoneNumber,
            'business_name' =>fake()->company(),
            'company_email' => fake()->companyEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        );
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
