<?php

namespace App\Http\Requests;

// use App\Rules\AlphaSpaces;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddProductData extends FormRequest
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
            'name' => [
                'required',
                'max:100',
                // new AlphaSpaces()
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

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Pro',
    //         'name.max' => 'Maksymalna ilość znaków to :max',
    //         'description.required' => 'Wiadomość jest wymagana',
    //         'price.required' => 'required',
    //         'image.mimes' => 'Plik musi być w wybranym formacie: png, jpg, jpeg, csv, txt, xlx, xls, pdf',
    //         'image.max' => "Maksymalny rozmiar pliku to 5MB"
    //     ];
    // }
}
