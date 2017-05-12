<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * NUMBER_QUESTION_PART_1 number question of part 1
     */
    const NUMBER_QUESTION_PART_1 = 10;

    /**
     * NUMBER_GROUP_IMAGE number group in part
     */
    const NUMBER_GROUP_IMAGE = 12;
    /**
     * NUMBER_GROUP_QUESTION number question in group
     */
    const NUMBER_GROUP_QUESTION = 4;
    /**
     * NUMBER_QUESTION_PART_4 number question of part 4
     */
    const NUMBER_QUESTION_PART_4 = 30;

    /**
     * NUMBER_GROUP_PART_6 number group of part 6
     */
    const NUMBER_GROUP_PART_6 = 3;

    /**
     * NUMBER_QUESTION_GROUP_PART_6 number question group of part 6
     */
    const NUMBER_QUESTION_GROUP_PART_6 = 4;

    /**
     * NUMBER_QUESTION_PART_4 number question of part 4
     */
    const NUMBER_QUESTION_PART_5 = 40;

    /**
     * NUMBER_QUESTION_PART_6 number question start of part 6
     */
    const NUMBER_QUESTION_START_PART_6 = 141;

    /**
     * NUMBER_QUESTION_PART_6 number question end of part 6
     */
    const NUMBER_QUESTION_END_PART_6 = 152;

    /**
     * NUMBER_QUESTION_PART_7 number question start of part 6
     */
    const NUMBER_QUESTION_START_PART_7 = 153;

    /**
     * NUMBER_QUESTION_PART_7 number question end of part 6
     */
    const NUMBER_QUESTION_END_PART_7 = 200;

    /**
     * NUMBER_GROUPS_PART_6 number group part 6
     */
    const NUMBER_GROUPS_PART_6 = 9;


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

     /**
     * Question hasmany  summaries
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }
}
