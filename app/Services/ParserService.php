<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ParserService
{
    protected static string $currenciesUrl = "http://www.cbr.ru/scripts/XML_daily.asp";

    public function parse(): void
    {
        $currencies = $this->getCurrencies();

        DB::transaction(function () use ($currencies) {
            foreach ($currencies as $currency) {
                Currency::query()->updateOrInsert([
                    'valuteID' => $currency
                ], $currency);
            }
        });
    }

    protected function getCurrencies(): array
    {
        $date = now()->subDays(30);
        $formated = $date->format('d/m/Y');

        $responseDaily = Http::get(static::$currenciesUrl . "?date_req=$formated");

        $xmlDaily = simplexml_load_string($responseDaily->body());
        $jsonDaily = json_encode($xmlDaily);
        $array = array_merge(json_decode($jsonDaily, true))['Valute'];

        return array_map(function ($value) use ($date) {
            return [
                'valuteID' => $value['@attributes']['ID'],
                'numCode' => $value['NumCode'],
                'charCode' => $value['CharCode'],
                'name' => $value['Name'],
                'value' => (float)str_replace(',', '.', $value['Value']),
                'date' => $date,
            ];
        }, $array);
    }
}
