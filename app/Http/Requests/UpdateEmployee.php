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
            'branch_id' => 'required_without:position_id,first_name,last_name,maiden_name,salary,date_of_hire|numeric',
            'position_id' => 'numeric',
            'first_name' => 'alpha|max:30',
            'last_name' => 'alpha|max:30',
            'maiden_name' => 'alpha|max:30',
            'salary' => 'numeric',
            'date_of_hire' => 'date'
        ];
    }
}
