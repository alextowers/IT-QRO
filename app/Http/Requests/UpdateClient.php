<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClient extends FormRequest
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
            'branch' => 'required_without:name,rfc,contact|numeric',
            'name' => 'alpha-num|max:50',
            'rfc' => 'alpha-num|min:12|max:13',
            'contact' => 'alpha|max:50'
        ];
    }
}
