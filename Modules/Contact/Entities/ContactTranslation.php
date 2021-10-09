<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Advertisement\Entities\Advertisement;

class ContactTranslation extends Model
{

    public $timestamps = false;
    protected $fillable = ['title', 'slug'];

}
