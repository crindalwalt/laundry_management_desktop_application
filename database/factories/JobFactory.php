<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */

/**
 * $table->id();
 * $table->string("Job_id");
 * $table->integer("cloth");
 * $table->double("payment");
 * $table->enum("cloth_status",["pending","completed","cancelled"]);
 * $table->enum("payment_status",["pending","completed","cancelled"]);
 * $table->dateTime("picking_time");
 * $table->longText("description");
 * $table->string("customer_id");
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomClothValues = ['pending', 'completed', 'cancelled', 'delivered'];
        $randomPaymentValues = ['pending', 'paid'];
        $randomJobType = ["pressing", "washing", "dry_cleaning"];
        return [
            'Job_id' => "JOB-" . $this->faker->randomNumber("6"),
            'cloth' => $this->faker->numberBetween(1, 10),
            'payment' => $this->faker->numberBetween(500, 5000),
            'cloth_status' => $this->faker->randomElement($randomClothValues),
            'payment_status' => $this->faker->randomElement($randomPaymentValues),
            'job_type' => $this->faker->randomElement($randomJobType),
            'picking_time' => $this->faker->dateTime(),
            'description' => $this->faker->paragraph,
            'customer_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
