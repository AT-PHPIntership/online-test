<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';

    /**
     *  PART_1 id of part 1
     */
    const PART_1 = 1;
    /**
     *  PART_1 id of part 1
     */
    const PART_4 = 4;
     /**
     *  PART_1 id of part 1
     */
    const PART_5 = 5;
    
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
