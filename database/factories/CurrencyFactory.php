<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'valuteID' => Str::upper(Str::random(1)) . $this->faker->numberBetween(10000, 99999),
            'numCode' => $this->faker->randomDigitNotNull(),
            'charCode' => $this->faker->currencyCode(),
            'name' => $this->faker->word(),
        ];
    }
}
