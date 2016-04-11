<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function yogaPoint()
    {
        return $this->belongsTo('App\YogaPoint');
    }
}
