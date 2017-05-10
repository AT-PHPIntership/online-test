<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';
    /**
     * Part 1
     */
    const PART_1 = 1;

    /**
     * Part 2
     */
    const PART_2 = 2;

    /**
     * Part 3
     */
    const PART_3 = 3;

    /**
     * Part 4
     */
    const PART_4 = 4;

    /**
     * Part 5
     */
    const PART_5 = 5;

    /**
     * Part 6
     */
    const PART_6 = 6;

    /**
     * Part 7
     */
    const PART_7 = 7;
    
    /**
     * Number question part 1
     */
    const NUMBER_QUESTION_PART_1 = 30;

    /**
     * Number question start part 2
     */
    const NUMBER_QUESTION_START_PART_2 = 11;

    /**
     * Number question end part 2
     */
    const NUMBER_QUESTION_END_PART_2 = 40;

    /**
     * Number question start part 3
     */
    const NUMBER_QUESTION_START_PART_3 = 41;

    /**
     * Number question end part 3
     */
    const NUMBER_QUESTION_END_PART_3 = 70;

    /**
     * Number question part 4
     */
    const NUMBER_QUESTION_PART_4 = 30;

    /**
     * Number question part 5
     */
    const NUMBER_QUESTION_PART_5 = 30;

    /**
     * Number question part 6
     */
    const NUMBER_QUESTION_PART_6 = 30;


    protected $fillable = [
        'title', 'description', 'number_answer', 'number_question'
    ];
    public $timestamps = true;

    /**
     * Part has many questions
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
