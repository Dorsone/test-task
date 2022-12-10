<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\CurrencyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CurrencyValue>
 */
class CurrencyValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $currency = Currency::query()->inRandomOrder()->first();
        return [
            'currency_id' => $currency->id,
            'value' => $this->faker->randomFloat(4),
            'date' => $this->faker->dateTime(),
        ];
    }
}
