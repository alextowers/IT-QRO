<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployee extends FormRequest
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
            'branch' => 'required_without:position,first_name,last_name,maiden_name,salary,date_of_hire|numeric',
            'position' => 'numeric',
            'first_name' => 'string|max:30',
            'last_name' => 'string|max:30',
            'maiden_name' => 'string|max:30',
            'salary' => 'numeric',
            'date_of_hire' => 'date'
        ];
    }
}
