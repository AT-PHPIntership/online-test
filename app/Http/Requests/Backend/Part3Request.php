<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class Part3Request extends FormRequest
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
        $rules = [
            'question.*.content'=>'required',
            'question.*.answer.*'=>'required',
        ];
        for ($i = 1; $i <= \App\Models\Part::NUMBER_QUESTION_PART_3; $i++) {
            $rules['question.'.$i.'.correct'] = 'required';
        }
        return $rules;
    }
    
    /**
     * Messages errors part 3
     *
     * @return string for requestion
     */
    public function messages()
    {
        $messages = [
            'question.*.content.required'=>'Please, enter content for question',
            'question.*.answer.*.required'=>'Please, enter answer for question',
        ];
        for ($i = 1; $i <= \App\Models\Part::NUMBER_QUESTION_PART_3; $i++) {
            $messages['question.'.$i.'.correct.required'] = 'Please! Choose the correct answer.';
        }
        return $messages;
    }
}
