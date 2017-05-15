<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    protected $table = 'users_exams';
    protected $fillable = [
        'user_id', 'exam_id'
    ];
    public $timestamps = true;

    /**
     * User_exam belongs to an exam.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * User_exam belongs to an user.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * User exam has many user_answers
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
