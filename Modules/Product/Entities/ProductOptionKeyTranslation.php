<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductOptionKeyTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
