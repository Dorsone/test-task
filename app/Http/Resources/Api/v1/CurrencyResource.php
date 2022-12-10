<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'valuteID' => $this->valuteID,
            'name' => $this->name,
            'numCode' => $this->numCode,
            'charCode' => $this->charCode,
        ];
    }
}
