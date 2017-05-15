<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $table = 'users_answers';
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
     * User_exam belongs to a question.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * User_answer belongs to a user_exam.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userExam()
    {
        return $this->belongsTo(UserExam::class);
    }
}
