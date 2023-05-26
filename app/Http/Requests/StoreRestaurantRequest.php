<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_name' => 'required|string|min:2|unique:restaurants,company_name',
            'address' => 'required|min:2',
            'vat_number' => 'required|digits:11',
            'telephone' => 'required|min:10|max:15|unique:restaurants,telephone',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'typologies' => 'array', // Verifica che 'typologies' sia un array
            'typologies.*' => 'integer', // Verifica che ogni elemento dell'array 'typologies' sia un intero (opzionale)
            'image' => 'nullable|image'
        ];
    }
}

