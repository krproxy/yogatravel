<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointImage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'point_images';

    const PATH_TO_FOLDER = "/img/PointImages/";

    public function yogaPoint()
    {
        return $this->belongsTo('App\YogaPoint');
    }

    public static function getPathToFolder()
    {
        return self::PATH_TO_FOLDER;
    }
}
