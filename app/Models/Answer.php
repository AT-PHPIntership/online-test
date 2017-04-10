<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
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
