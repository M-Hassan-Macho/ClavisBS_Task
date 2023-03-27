<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegisterRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string',  'digits:11', 'unique:users'],
            'password' => ['required', 'string', 'min:6','same:confirm-password'],
            'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'roles' => ['required'],
        ];
    }
}
