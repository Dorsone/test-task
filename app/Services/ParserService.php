<?php

namespace App\Services;

use App\Adapters\CentralBankAdapter;
use App\Exceptions\ApiRequestFailedException;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;

class ParserService
{

    protected CentralBankAdapter $centralBankAdapter;

    public function __construct(CentralBankAdapter $centralBankAdapter)
    {
        $this->centralBankAdapter = $centralBankAdapter;
    }

    /**
     * @throws ApiRequestFailedException
     */
    public function parse(): void
    {
        $currencies = $this->centralBankAdapter->getCurrencies();

        DB::transaction(function () use ($currencies) {
            foreach ($currencies as $currency) {
                Currency::query()->updateOrInsert([
                    'valuteID' => $currency['valuteID']
                ], $currency);
            }

            $currencies = Currency::all();
            foreach ($currencies as $currency) {
                $currency->currencyValues()
                    ->createMany(
                        $this->centralBankAdapter->getCurrenciesValues($currency)
                    );
            }
        });
    }

}
