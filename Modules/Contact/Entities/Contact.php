<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Koddea\Localize\Traits\ModelTranslation;
use Modules\Advertisement\Entities\Advertisement;

class Contact extends Model
{

    use ModelTranslation;

    public $translatedAttributes = ['title', 'slug'];
    protected $fillable = [];

    public function created_at()
    {
        return $this->date($this->created_at);
    }

    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return $date->diffForHumans();
    }

}
