<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageCategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];
}
