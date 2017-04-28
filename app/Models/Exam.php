<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * Flag type finished exams
     */
    const FINISHED = 1;

    /**
     * Flag type not finished exams
     */
    const NOT_FINISHED = 0;

    protected $table = "exams";
    protected $fillable = [
        'title' , 'audio', 'count_test' , 'is_finished'
    ];
    public $timestamps = true;

    /**
     * Exam has many User_exams
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userExams()
    {
        return $this->hasMany(Exam::class);
    }

    /**
     * Exam has many questions
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
