<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //$table->id();
            //            $table->string('invoice_item');
            //            $table->string('invoice_quantity');
            //            $table->string('invoice_unit_cost');
            //            $table->string('invoice_number');
            //            $table->string('customer');
            //            $table->string('invoice_due_date');
            //            $table->string('invoice_note');
            //            $table->timestamps();

            'invoice_item'=> $this->faker->city,
            'invoice_quantity'=> $this->faker->numberBetween(500, 1000),
            'invoice_unit_cost' => $this->faker->numberBetween(200, 500),
            'invoice_number'=> $this->faker->numberBetween(1, 100),
            'customer' => $this->faker->name(),
            'invoice_due_date' => $this->faker->dateTime(),
            'invoice_note' => $this->faker->paragraph(1),




        ];
    }
}
