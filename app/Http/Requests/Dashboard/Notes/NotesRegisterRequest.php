<?php

namespace App\Http\Requests\Dashboard\Notes;

use Illuminate\Foundation\Http\FormRequest;

class NotesRegisterRequest extends FormRequest
{
    /**
     * Determine if the note is authorized to make this request.
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
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
        ];
    }
}
