<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class ProductOptionKey extends Model
{
    use ModelTranslation;

    public $translatedAttributes = ['name'];
    protected $fillable = [];

    public function products(){
        return $this->belongsToMany('Modules\Product\Entities\Product','product_product_option_keys', 'product_option_key_id','product_id')->withPivot('value')->selectRaw('count(products.id) as aggregate')->groupBy('pivot_product_id', 'pivot_product_option_key_id', 'value');
    }

    public function category()
    {
        return $this->belongsTo('Modules\Product\Entities\ProductCategory', 'product_category_id');
    }

    public function type()
    {
        return $this->belongsTo('Modules\Product\Entities\ProductOptionType', 'product_option_type_id');
    }

    public function values()
    {
        return $this->hasMany(ProductOptionKeyValue::class);
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