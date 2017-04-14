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
}
