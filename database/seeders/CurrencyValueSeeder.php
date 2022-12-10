<?php

namespace Database\Seeders;

use App\Models\CurrencyValue;
use Illuminate\Database\Seeder;

class CurrencyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        CurrencyValue::factory(1000)->create();
    }
}
