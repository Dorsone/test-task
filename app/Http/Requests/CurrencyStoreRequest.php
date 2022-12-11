<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'valuteID' => 'required|unique:currencies,valuteID',
            'name' => 'required|string|max:255',
            'numCode' => 'required|numeric|max:999|unique:currencies,numCode',
            'charCode' => 'required|string|unique:currencies,charCode',
        ];
    }
}
