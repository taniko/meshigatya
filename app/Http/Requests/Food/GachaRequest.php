<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class GachaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'max_price'     => 'integer',
            'min_price'     => 'integer',
            'uncontained'   => 'array',
            'categories'    => 'array',
            'categories.*'  => 'string',
            'foodstuffs'    => 'array',
            'foodstuffs.*'  => 'string',
            'lat'           => 'numeric|required',
            'lng'           => 'numeric|required',
            'distance'      => 'numeric|required',
        ];
    }
}
