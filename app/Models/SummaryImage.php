<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SummaryImage extends Model
{
    protected $table = 'summary_images';
    protected $fillable = [
      'image'
    ];
    public $timestamps = true;

    /**
    * Get all of the image's sumaries.
     *
    * @return string
    */
    public function summaries()
    {
        $this->morphMany('App\Models\Summary', 'summaryable');
    }
}
