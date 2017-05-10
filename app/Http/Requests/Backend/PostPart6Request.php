<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PostPart6Request extends FormRequest
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
            'group.*.content'=>'required',
            'group.*.question.*.answer.*'=>'required',
        ];
        for ($i = 1; $i <= \App\Models\Question::NUMBER_GROUP_PART_6; $i++) {
            for ($j =1; $j<= \App\Models\Question::NUMBER_QUESTION_GROUP_PART_6; $j++) {
                $rules['group.'.$i.'.question.'.$j.'.correct'] = 'required';
            }
        }
        return $rules;
    }
}
