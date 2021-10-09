<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class PageCategory extends Model
{

    use ModelTranslation;

    public $translatedAttributes = ['name', 'slug'];
    protected $fillable = [];

    public function pages()
    {
        return $this->hasMany(Page::class, "page_category_id");
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($telco) {
            $relationMethods = ['pages'];

            foreach ($relationMethods as $relationMethod) {
                if ($telco->$relationMethod()->count() > 0) {
//                    return false;
                    throw new \Exception('page::index.category.error.delete'.$relationMethod);
                }
            }
        });
    }
}
