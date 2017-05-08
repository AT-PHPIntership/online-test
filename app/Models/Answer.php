<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * Value Answer correct is 1
     */
    const IS_CORRECT = 1;
    /**
     * Value Answer correct is 0
     */
    const NOT_CORRECT = 0;
    /**
     * Number answer of part 1 , part 3 to part 7 is 4
     */
    const NUMBER_ANSWER_4= 4;
    
    protected $table = 'answers';
    protected $fillable = [
        'content', 'question_id'
    ];
    public $timestamps = true;

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
