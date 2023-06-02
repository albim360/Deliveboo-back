<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'date' => 'date',
            'full_name' => 'string|max:50',
            'telephone' => 'string|max:30',
            'address' => 'string|max:100',
            'email' => 'email',
            'products' => 'exists:products,id',
            'quantity' => 'string|max:100',
        ];
    }

}
