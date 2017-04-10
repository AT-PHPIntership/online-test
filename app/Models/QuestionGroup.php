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
}
