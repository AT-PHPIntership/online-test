<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SummaryImage extends Model
{
    protected $table = 'summary_images';
    protected $fillable = 'image';
    public $timestamps = true;
}
