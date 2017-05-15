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
     * Number start
     */
    const NUMBER_QUESTION_START = 1;
    
    /**
     * Number question part 1
     */
    const NUMBER_QUESTION_PART_1 = 30;

    /**
     * Number question part 2
     */
    const NUMBER_QUESTION_PART_2 = 30;

    /**
     * Number question part 3
     */
    const NUMBER_QUESTION_PART_3 = 30;

    /**
     * Number question part 4
     */
    const NUMBER_QUESTION_PART_4 = 30;

    /**
     * Number question part 5
     */
    const NUMBER_QUESTION_PART_5 = 40;

    /**
     * Number question part 6
     */
    const NUMBER_QUESTION_PART_6 = 30;
    
    /**
     * Number start part 2
     */
    const START_PART_2 = 10;

    /**
     * Number start part 3
     */
    const START_PART_3 = 40;

    /**
     * Number start part 4
     */
    const START_PART_4 = 70;

    /**
     * Number start part 5
     */
    const START_PART_5 = 100;

    /**
     * Number start part 6
     */
    const START_PART_6 = 140;
    
    /**
     * Number start part 7
     */
    const START_PART_7 = 152;
    
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
