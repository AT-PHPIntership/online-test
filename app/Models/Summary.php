<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'summary';
    protected $fillable = [
        'summary_id', 'summary_type'
    ];
    public $timestamps = true;
}
