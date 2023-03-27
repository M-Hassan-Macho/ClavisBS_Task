<?php

namespace App\Http\Requests\Dashboard\Employees;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRegisterRequest extends FormRequest
{
    /**
     * Determine if the Employee is authorized to make this request.
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'phone' => ['required', 'string',  'digits:11', 'unique:employees'],
        ];
    }
}
