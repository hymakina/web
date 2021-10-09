<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductProductAttributeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['value'];
}
