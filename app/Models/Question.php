<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * NUMBER_QUESTION_PART_1 number question of part 1
     */
    const NUMBER_QUESTION_PART_1 = 10;

    protected $table = 'questions';
    protected $fillable = [
        'content', 'part_id', 'exam_id'
    ];
    public $timestamps = true;

    /**
     * Question belongs to a part.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    /**
     * Question belongs to an exam.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Question has many answers
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Question has many user_answers
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    /**
     * Question has one question_image
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function questionImage()
    {
        return $this->hasOne(QuestionImage::class);
    }
}
