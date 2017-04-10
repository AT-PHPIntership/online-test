<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'categories';
    protected $fillable = 'name';
    public $timestamps = true;

    /**
     * Category has many news
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
