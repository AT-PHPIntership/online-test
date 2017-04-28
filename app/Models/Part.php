<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';

    const PART_1 = 1;
    const PART_2 = 2;
    const PART_3 = 3;
    const PART_4 = 4;
    const PART_5 = 5;
    const PART_6 = 6;
    const PART_7 = 7;

    const NUMBER_QUESTION_PART_1 = 10;
    
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
