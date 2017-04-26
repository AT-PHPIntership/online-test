<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Observers\UserObserver;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use Notifiable;
   
    protected $table = 'admin_users';
    /**
     * Sex Male
     */
    const SEX_MALE = 0;

    /**
     * Sex female
     */
    const SEX_FEMALE = 1;

    /**
     * Set the user's sex.
     *
     * @return string
     */
    public function getSexLabelAttribute()
    {
        if ($this->sex == self::SEX_MALE) {
            return trans('labels.male');
        }
        return trans('labels.female');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sex', 'birthday'
    ];

    public $timestamps = true;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Admin User has many news
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
