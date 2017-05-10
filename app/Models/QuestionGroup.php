<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    protected $table = 'question_group';
    protected $fillable = [
        'question_id', 'summary_id'
    ];
    public $timestamps = true;

    /**
     * QuestionGroup has many questions
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * QuestionGroup has many summaries
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }
}
