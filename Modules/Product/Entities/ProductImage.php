<?php

namespace Modules\Product\Entities;

use App\Traits\ImageUploader;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use ImageUploader;

    protected $fillable = [];
    private $uploaderBaseDirectory = "/product/images";

    public static function boot()
    {
        parent::boot();

//        self::deleting(function($image)
//        {
//            $image->deleteImageDir();
//        });
    }

    public function product()
    {
        return $this->belongsTo('Modules\Product\Entities\Product');
    }

}
