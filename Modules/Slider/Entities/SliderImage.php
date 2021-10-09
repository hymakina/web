<?php

namespace Modules\Slider\Entities;

use App\Traits\ImageUploader;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use ImageUploader;

    protected $fillable = [];
    private $uploaderBaseDirectory = "/sliders";

    public static function boot()
    {
        parent::boot();

//        self::deleting(function($image)
//        {
//            $image->deleteImageDirectory();
//        });
    }

    public function slider()
    {
        return $this->belongsTo('Modules\Slider\Entities\Slider');
    }

}
