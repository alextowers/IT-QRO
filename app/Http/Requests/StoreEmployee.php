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
            'branch_id' => 'required|numeric',
            'position_id' => 'required|numeric',
            'first_name' => 'required|alpha|max:30',
            'last_name' => 'required|alpha|max:30',
            'maiden_name' => 'required|alpha|max:30',
            'salary' => 'required|numeric',
            'date_of_hire' => 'required|date'
        ];
    }
}
