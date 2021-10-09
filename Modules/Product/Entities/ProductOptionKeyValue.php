<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class ProductOptionKeyValue extends Model
{
    use ModelTranslation;

    public $translatedAttributes = ['name'];
    protected $fillable = [];

    public static function boot()
    {
        parent::boot();

        ProductOptionKeyValue::deleting(function($item)
        {
            $item->deleteTranslations();
        });
    }
}
