<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';
    protected $fillable = [
        'title', 'description', 'number_answer', 'number_question'
    ];
    public $timestamps = true;

    /**
     * Part has many questions
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
