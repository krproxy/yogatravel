<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cmgmyr\Messenger\Traits\Messagable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract//,
//    UserInterface
{
    use Authenticatable, Authorizable, CanResetPassword, Messagable, SyncableGraphNodeTrait;

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
    protected $fillable = ['name', 'shortStory', 'email', 'vkontakte_user_id', 'avatar', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'access_token'];

    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
//        'name' => 'full_name',
//        'graph_node_field_name' => 'database_column_name',
    ];

    public function yogaPoints()
    {
        return $this->hasMany('App\YogaPoint');
    }
}
