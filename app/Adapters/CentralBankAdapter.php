<?php

namespace App\Adapters;

use App\Exceptions\ApiRequestFailedException;
use App\Models\Currency;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CentralBankAdapter
{
    protected static string $currenciesUrl = "http://www.cbr.ru/scripts/XML_valFull.asp";
    protected static string $currencyValuesUrl = "http://www.cbr.ru/scripts/XML_dynamic.asp";

    /**
     * @throws ApiRequestFailedException
     */
    public function getCurrenciesValues(Currency $currency): array
    {
        $date1 = now()->subDays(30)->format('d/m/Y');
        $date2 = now()->format('d/m/Y');
        $valuteId = $currency->valuteID;

        $url = static::$currencyValuesUrl . "?date_req1=$date1&date_req2=$date2&VAL_NM_RQ=$valuteId";

        $response = Http::get($url);

        if (!($response->status() == ResponseAlias::HTTP_OK)) {
            $this->failedRequestException($url);
        }

        $array = Arr::get($this->xmlToArray($response->body()), 'Record', []);

        return array_map(function ($value) {
            return [
                'date' => Arr::get($value, '@attributes.Date'),
                'value' => (float)str_replace(',', '.', Arr::get($value, 'Value')),
            ];
        }, $array);
    }

    /**
     * @throws ApiRequestFailedException
     */
    protected function failedRequestException(string $url)
    {
        throw new ApiRequestFailedException("This url($url) is not available or incorrect");
    }

    /**
     * @throws ApiRequestFailedException
     */
    public function getCurrencies(): array
    {
        $url = static::$currenciesUrl;

        $responseDaily = Http::get($url);

        if (!($responseDaily->status() == ResponseAlias::HTTP_OK)) {
            $this->failedRequestException($url);
        }

        $array = Arr::get($this->xmlToArray($responseDaily->body()), 'Item', []);

        return array_map(function ($value) {
            return [
                'valuteID' => trim(Arr::get($value, 'ParentCode')),
                'numCode' => Arr::get($value, 'ISO_Num_Code'),
                'charCode' => Arr::get($value, 'ISO_Char_Code'),
                'name' => Arr::get($value, 'Name'),
            ];
        }, $array);
    }

    protected function xmlToArray(string $xml): array
    {
        $xmlObject = simplexml_load_string($xml);
        $json = json_encode($xmlObject);
        return json_decode($json, true);
    }
}
