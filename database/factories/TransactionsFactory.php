<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //$table->id();
        //            $table->integer('amount');
        //            $table->string('customer');
        //            $table->string('reference');
        //            $table->string('paid_on');
        //            $table->timestamps();

        return [

            'amount'=> $this->faker->numberBetween(500, 5000),
            'customer'=> $this->faker->name(),
            'reference' =>"REFERENCE",
            'paid_on' => $this->faker->dateTime,


        ];
    }
}
