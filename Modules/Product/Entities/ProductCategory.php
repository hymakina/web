<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class ProductCategory extends Model
{
    use ModelTranslation;

    public $translatedAttributes = ['name', 'slug', 'meta_title', 'meta_keywords', 'meta_description'];
    protected $fillable = [];

    public function options()
    {
        return $this->hasMany(ProductOptionKey::class);
    }

    public function products() {
        return $this->belongsToMany('Modules\Product\Entities\Product', 'product_product_categories');
    }

//    public function keys(){
//        return $this->belongsToMany('Modules\Product\Entities\Product','product_product_option_keys')->withPivot('product_id');
//    }
}
