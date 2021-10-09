<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class PageTemplate extends Model
{

    protected $fillable = [];

    public function pages()
    {
        return $this->hasMany(Page::class, "page_template_id");
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($telco) {
            $relationMethods = ['pages'];

            foreach ($relationMethods as $relationMethod) {
                if ($telco->$relationMethod()->count() > 0) {
//                    return false;
                    throw new \Exception('page::index.template.error.delete'.$relationMethod);
                }
            }
        });
    }
}
