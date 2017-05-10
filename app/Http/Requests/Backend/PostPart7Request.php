<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PostPart7Request extends FormRequest
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
            'questions.*.content.question.*'=>'required',
            'questions.*.image'=>'required|image',
            'questions.*.content.answer.*.*'=>'required',
            'questions.*.content.correct.*'=>'required',
        ];
    }
}
