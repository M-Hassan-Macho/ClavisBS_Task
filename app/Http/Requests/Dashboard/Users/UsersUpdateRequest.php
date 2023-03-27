<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
        $user = request()->route('user');
        return [
            'username' => ['sometimes:required', 'string', 'max:255'],
            'email' => ['sometimes:required', 'string', 'email', 'max:255', "unique:users,email,{$user->id}"],
            'phone' => ['sometimes:required', 'string',  'digits:11', "unique:users,phone,{$user->id}"],
            'image' => ['sometimes:required', 'file', 'mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'roles' => ['sometimes:required'],
        ];
    }
}
