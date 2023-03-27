<?php

namespace App\Http\Requests\Dashboard\UserHasNotes;

use Illuminate\Foundation\Http\FormRequest;

class UserHasNotesRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['sometimes:required', 'integer'],
            'note_id' => ['sometimes:required', 'integer'],
        ];
    }
}
