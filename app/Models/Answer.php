<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'content', 'question_id'
    ];
    public $timestamps = true;
    
    /**
     * Correct number 1
     */
    const IS_CORRECT = 1;

    /**
     * Not coreect number 0
     */
    const NOT_CORRECT = 0;
    
    /**
     * Number answer = 3
     */
    const NUMBER_ANSWER_PART_2 = 3;

    /**
     * Number answer = 4
     */
    const NUMBER_ANSWER_PART_3 = 4;
    /**
     * Answer belongs to a question.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
