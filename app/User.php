<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Model;


class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, Messagable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['name', 'email', 'password'];
    protected $fillable = ['name', 'shortStory', 'email', 'social_id', 'avatar', 'password', 'is_blocked', 'instructor'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'access_token'];

    public function yogaPoints()
    {
        return $this->hasMany('App\YogaPoint');
    }

    public function isBanned()
    {
        return $this->is_blocked;
    }
}
