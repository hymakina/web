<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class ProductProductOptionKey extends Model
{

    protected $fillable = [];

    public function option()
    {
        return $this->belongsTo('Modules\Product\Entities\ProductOptionKey', 'product_option_key_id');
    }

    public function product()
    {
        return $this->belongsTo('Modules\Product\Entities\Product', 'product_id');
    }

    public function values()
    {
        return $this->hasMany(ProductOptionKeyValue::class);
    }

    public function products(){
        return $this->belongsToMany('Modules\Product\Entities\Product','product_product_option_keys', 'product_id', 'product_option_key_id')->withPivot('product_id');
    }

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::deleting(function($telco) {
//            $relationMethods = ['menuItems'];
//
//            foreach ($relationMethods as $relationMethod) {
//                if ($telco->$relationMethod()->count() > 0) {
//                    throw new \Exception('menu::index.error.delete'.$relationMethod);
//                }
//            }
//        });
//    }

}