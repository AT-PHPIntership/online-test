<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Summary extends Model
{
    protected $table = 'summary';
    protected $fillable = [
        'summary_id', 'summary_type'
    ];
    public $timestamps = true;

    /**
    * Get all of the owning summarytable models.
     *
    * @return string
    */
    public function summarytable()
    {
        return $this->morphTo();
    }
}
