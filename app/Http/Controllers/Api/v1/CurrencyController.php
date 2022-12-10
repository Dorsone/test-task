<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\CurrencyRatesResource;
use App\Models\Currency;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    protected CurrencyService $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function currencyRates(Currency $currency): CurrencyRatesResource
    {
        $data = $this->currencyService->getCurrencyRates($currency);
        return CurrencyRatesResource::make($data);
    }
}
