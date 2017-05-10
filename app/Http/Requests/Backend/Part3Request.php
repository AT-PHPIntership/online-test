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
        for ($i = \App\Models\Part::NUMBER_QUESTION_START_PART_3; $i <= \App\Models\Part::NUMBER_QUESTION_END_PART_3; $i++) {
            $rules['question.'.$i.'.correct'] = 'required';
        }
        return $rules;
    }
}
