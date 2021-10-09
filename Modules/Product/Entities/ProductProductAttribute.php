<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class ProductProductAttribute extends Model
{
    use ModelTranslation;

    public $translatedAttributes = ['value'];
    protected $fillable = [];

    public static function boot()
    {
        parent::boot();

        ProductProductAttribute::deleting(function($item)
        {
            $item->deleteTranslations();
        });
    }

    public function attribute()
    {
        return $this->belongsTo('Modules\Product\Entities\ProductAttribute', 'product_attribute_id');
    }

}