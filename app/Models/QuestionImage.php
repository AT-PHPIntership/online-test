<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionImage extends Model
{
    protected $table = 'question_images';
    protected $fillable = [
        'image','question_id'
    ];
    public $timestamps = true;

    /**
     * Question_image belongs to a question.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
