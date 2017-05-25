<?php

namespace App\Models;

use App\Models\UserExam;
use App\Observers\UserObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

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
        'name', 'email', 'password', 'sex', 'birthday'
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
     * User has many users_exam
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userExams()
    {
        return $this->hasMany(UserExam::class);
    }
}
