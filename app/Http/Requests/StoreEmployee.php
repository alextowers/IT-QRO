<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'branch' => 'required|numeric',
            'position' => 'required|numeric',
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'maiden_name' => 'required|string|max:30',
            'salary' => 'required|numeric',
            'date_of_hire' => 'required|date'
        ];
    }
}
