<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Summary extends Model
{
    protected $table = 'summary';
    protected $fillable = [
        'summaryable_id', 'summaryable_type'
    ];
    public $timestamps = true;

    /**
    * Get all of the owning summaryable models.
     *
    * @return string
    */
    public function summaryable()
    {
        return $this->morphTo();
    }

    /**
     * Summary belongsToMany to a question.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_group')->withTimestamps();
    }
}
