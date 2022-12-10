<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\CurrencyValue;

class CurrencyService
{
    public function getCurrencyRates(Currency $currency): array
    {
        return [
            'rates' => CurrencyValue::query()->where('currency_id', '=', $currency->id)->getByDate()->get(),
            'currency' => $currency
        ];
    }
}
