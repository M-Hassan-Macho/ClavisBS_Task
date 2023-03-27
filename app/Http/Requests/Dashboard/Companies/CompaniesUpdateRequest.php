<?php

namespace App\Http\Requests\Dashboard\Companies;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesUpdateRequest extends FormRequest
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
        $company = request()->route('company');
        return [
            'name' => ['sometimes:required', 'string', 'max:255'],
            'website' => ['sometimes:required', 'string', 'max:255'],
            'email' => ['sometimes:required', 'string', 'email', 'max:255', "unique:companies,email,{$company->id}"],
        ];
    }
}
