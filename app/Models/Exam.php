<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * Flag type finished part 1
     */
    const FINISHED_PART_1 = 1;

    /**
     * Flag type finished part 2
     */
    const FINISHED_PART_2 = 2;

    /**
     * Flag type finished part 3
     */
    const FINISHED_PART_3 = 3;

    /**
     * Flag type finished part 4
     */
    const FINISHED_PART_4 = 4;

    /**
     * Flag type finished part 5
     */
    
    const FINISHED_PART_5 = 5;
    /**
     * Flag type finished part 6
     */
    
    const FINISHED_PART_6 = 6;

    /**
     * Flag type finished part 7
     */
    const FINISHED_PART_7 = 7;
    
    /**
     * Flag type not finished
     */
    const NOT_FINISHED = 0;

    protected $table = "exams";
    protected $fillable = [
        'title' , 'audio', 'count_test' , 'finished_part'
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
