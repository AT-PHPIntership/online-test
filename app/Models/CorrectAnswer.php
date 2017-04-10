<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model
{
    protected $table = 'correct_answers';
    protected $fillable = [
        'question_id', 'answer_id'
    ];
    public $timestamps = true;

    /**
     * User_exam belongs to an answer.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * User_exam belongs to an question.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
