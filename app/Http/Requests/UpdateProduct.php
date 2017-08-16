<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'category' => 'required_without:branch,sku,name,price,image|numeric',
            'branch' => 'array',
            'sku' => 'numeric|min:6|max:15',
            'name' => 'alpha_num|max:50',
            'price' => 'numeric',
            'image' => 'image'
        ];
    }
}
