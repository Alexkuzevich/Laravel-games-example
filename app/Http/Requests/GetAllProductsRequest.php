<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAllProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filter_min_price' => 'nullable|int|min:0',
            'filter_max_price' => 'nullable|int',
            'filter_publisher' => 'nullable|string',
            'filter_category' => 'nullable|string',
            'filter_novelty' => 'nullable|bool',

            'sortByPrice' => 'nullable|bool',
            'sortByNovelty' => 'nullable|bool',
            'sortByPosition' => 'nullable|bool'
        ];
    }
}
