<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PageTranslation extends Model
{

    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'content', 'meta_title', 'meta_keywords', 'meta_description'];

}