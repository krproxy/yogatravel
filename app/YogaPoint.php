<?php

namespace App;

use Angrydeer\Attachfiles\AttachableInterface;
use Angrydeer\Attachfiles\AttachableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class YogaPoint extends Model implements AttachableInterface
{
    use AttachableTrait, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yoga_points';

    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pointImages()
    {
        return $this->hasMany('App\PointImage');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at','dsc');
    }
}
