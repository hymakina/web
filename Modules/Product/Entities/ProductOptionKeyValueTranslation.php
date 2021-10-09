<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductOptionKeyValueTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
