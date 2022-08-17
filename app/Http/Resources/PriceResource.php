<?php

namespace App\Http\Resources;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Price
 * @mixin Product
 */

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        //($this->product);
        return [
            'id' => optional($this->product)->id,
            'name' => optional($this->product)->name,
            'price_type' => $this->price_type,
            'price' => $this->price,
            ];
    }
}
