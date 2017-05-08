<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SummaryText extends Model
{
    protected $table = 'summary_text';
    protected $fillable = [
      'content'
    ];
    public $timestamps = true;

    /**
    * Get all of the text's summaries.
     *
    * @return string
    */
    public function summaries()
    {
        $this->morphMany('App\Models\Summary', 'summarytable');
    }
}
