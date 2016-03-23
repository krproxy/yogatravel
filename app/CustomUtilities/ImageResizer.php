<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 27.02.16
 * Time: 8:23
 */

namespace App\CustomUtilities;


use Intervention\Image\Facades\Image;

class ImageResizer
{
    private $_image;
    private $_width;
    private $_height;

    function __construct($Image, $Width, $Height)
    {
        $this->_image = Image::make($Image);
        $this->_width = $Width;
        $this->_height = $Height;
    }

    public function Resize()
    {
        /**
         * проверяем нужно ли ресайзить
         */
        if ($this->_image->width() != $this->_width) {
            $this->_image->resize($this->_width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $this->HeightCheck();
        }

        return $this->_image;
    }

    private function WidthCheck()
    {
        if ($this->_image->width() > $this->_width) {
            $this->_image->crop($this->_width, $this->_height);
        } elseif ($this->_image->width() < $this->_width) {
            $this->_image->resize($this->_width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $this->HeightCheck();
        }
    }

    private function HeightCheck()
    {
        if ($this->_image->height() > $this->_height)
            $this->_image->crop($this->_width, $this->_height);
        elseif ($this->_image->height() < $this->_height) {
            $this->_image->resize(null, $this->_height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $this->WidthCheck();
        }

    }
}