<?php

namespace App\Http\Requests;

use App\Helpers\RedirectHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class NoteStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required",
            "note" => "required",
        ];
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator) {RedirectHelper::failedValidation($validator); }
}
