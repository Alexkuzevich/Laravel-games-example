<?php

namespace App\Http\Resources;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $price = $this->prices()->where('price_type', 'sale price');

        if ($price->exists()) {
            $price = $price->first();
        } else {
            $price = $this->prices()->where('price_type', 'normal price')->first();
        }

        return [
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'preview_image' => $this->preview_image,
            'video' => $this->video,
            'publisher_name' => optional($this->publisher)->name,
            'price' => $price,


        ];
    }
}
