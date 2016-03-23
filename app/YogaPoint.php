<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YogaPoint extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yoga_points';

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
