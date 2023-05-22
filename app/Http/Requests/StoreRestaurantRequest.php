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
            'company_name' => 'required|min:2',
            'address' => 'required|min:2',
            'vat_number' => 'required|min:11|max:11',
            'telephone' => 'required|min:10|max:15|unique:restaurants,telephone',
            'description'=>'nullable|string',
            'image'=>'nullable|url',
            'product_id' => 'nullable|exists:products,id',
        ];
    }
}
