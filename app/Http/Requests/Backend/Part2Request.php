<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class Part2Request extends FormRequest
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
        $rules = [];
        for ($i = 1; $i <= \App\Models\Part::NUMBER_QUESTION_PART_2; $i++) {
            $rules['question.'.$i.'.correct'] = 'required';
        }
        return $rules;
    }

    /**
     * Messages errors part 2
     *
     * @return string
     */
    public function messages()
    {
        $messages = [];
        for ($i = 1; $i <= \App\Models\Part::NUMBER_QUESTION_PART_2; $i++) {
            $messages['question.'.$i.'.correct.required'] = 'Please! Choose the correct answer.';
        }
        return $messages;
    }
}
