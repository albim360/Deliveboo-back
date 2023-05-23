<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'company_name' => 'required|string|min:2|unique:restaurants,company_name',
            'address' => 'required|min:2',
            'vat_number' => 'required|digits:11',
            'telephone' => 'required|min:10|max:15|unique:restaurants,telephone',
            'description'=>'nullable|string',
            'image'=>'nullable|url',
            'product_id' => 'nullable|exists:products,id',
            'typologies' => 'exists:typologies,id'
        ];
    }
}
