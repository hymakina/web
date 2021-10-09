<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [];
  
    public static function boot()
    {
        parent::boot();

        Slider::deleting(function($slider)
        {
            foreach ($slider->images as $image)
            {
                $image->delete();
            }
        });
    }
  
    public function images()
    {
        return $this->hasMany(SliderImage::class);
    }
}
