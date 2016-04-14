<?php

namespace App;

use Angrydeer\Attachfiles\AttachableInterface;
use Angrydeer\Attachfiles\AttachableTrait;
use Illuminate\Database\Eloquent\Model;

class YogaPoint extends Model implements AttachableInterface
{
    use AttachableTrait;

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
