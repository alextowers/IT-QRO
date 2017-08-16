<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'branch_id' => 'required|numeric',
            'name' => 'required|alpha-num|max:50',
            'rfc' => 'required|alpha-num|min:12|max:13',
            'contact' => 'required|alpha|max:50'
        ];
    }
}