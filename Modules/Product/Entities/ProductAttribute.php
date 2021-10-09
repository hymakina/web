<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Koddea\Localize\Traits\ModelTranslation;

class ProductAttribute extends Model
{
    use ModelTranslation;

    public $translatedAttributes = ['name'];
    protected $fillable = [];

}
