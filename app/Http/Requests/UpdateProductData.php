<?php

namespace App\Http\Requests;

// use App\Rules\AlphaSpaces;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductData extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productId'  => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'max:100',
            ],
            'description' => [
                'required'
            ],
            'price1' => [
                'required',
                'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
            ],
            'price2' => [
                'nullable',
                'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
            ],
            'price3' => [
                'nullable',
                'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
            ],
            'image' => [
                'nullable',
                'max:5120',
                'mimes:png,jpg,jpeg'
            ]

        ];
    }
}
