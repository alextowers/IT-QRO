<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'category' => 'required|numeric',
            'branch' => 'required|array',
            'sku' => 'required|numeric|min:6|max:15',
            'name' => 'required|alpha_num|max:50',
            'price' => 'required|numeric',
            'image' => 'required|image'
        ];
    }
}
