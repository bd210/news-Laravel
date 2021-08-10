<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:500|unique:posts,title',
            'content' => 'required|min:5|max:100000',
            'category_id' => 'required',
            'tag_id' => 'required',
            'file' => 'required|max:204800',
            'file.*' => 'mimes:jpeg,jpg,png,wma,mp3,mp4',
        ];
    }

    public function messages()
    {
        return [

            'file.*.mimes' => "The file must be a file of type: jpeg, jpg, png, wma, mp3, mp4."

        ];
    }
}
