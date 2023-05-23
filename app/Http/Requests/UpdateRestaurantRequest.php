<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
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
            'company_name' => [
                'required',
                'min:2',
                'string',
                Rule::unique('restaurants', 'company_name')->ignore($this->restaurant)
            ],
            'address' => 'required|min:2',
            'vat_number' => 'required|digits:11',
            'telephone' => 'required|min:10|max:15|unique:restaurants,telephone',
            'description'=>'nullable|string',
            'image'=>'nullable|url',
            
        ];
    }
}
