<?php

namespace App\Http\Requests\BadWords;

use Illuminate\Foundation\Http\FormRequest;

class BadWordUpdateRequest extends FormRequest
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
            'word' => 'required|min:3|max:20'
        ];
    }
}
