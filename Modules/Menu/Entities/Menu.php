<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($telco) {
            $relationMethods = ['menuItems'];

            foreach ($relationMethods as $relationMethod) {
                if ($telco->$relationMethod()->count() > 0) {
                    throw new \Exception('menu::index.error.delete'.$relationMethod);
                }
            }
        });
    }

}
