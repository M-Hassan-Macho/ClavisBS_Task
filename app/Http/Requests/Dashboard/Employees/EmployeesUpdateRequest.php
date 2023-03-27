<?php

namespace App\Http\Requests\Dashboard\Employees;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesUpdateRequest extends FormRequest
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
        $employee = request()->route('employee');
        return [
            'first_name' => ['sometimes:required', 'string', 'max:255'],
            'last_name' => ['sometimes:required', 'string', 'max:255'],
            'company' => ['sometimes:required', 'string', 'max:255'],
            'email' => ['sometimes:required', 'string', 'email', 'max:255', "unique:employees,email,{$employee->id}"],
            'phone' => ['sometimes:required', 'string',  'digits:11', "unique:employees,phone,{$employee->id}"],
        ];
    }
}
