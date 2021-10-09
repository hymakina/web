<?php

namespace Modules\Page\Entities;

use App\Traits\ImageUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Koddea\Localize\Traits\ModelTranslation;

class Page extends Model
{

    use ImageUploader;
    use ModelTranslation;

    private $uploaderBaseDirectory = "/pages";
    public $translatedAttributes = ['title', 'slug', 'subtitle', 'content', 'meta_title', 'meta_keywords', 'meta_description'];
    protected $fillable = [];

//    public static function boot()
//    {
//        parent::boot();
//
//        Page::deleting(function($page)
//        {
//            $page->deleteImageDir();
//        });
//    }

    public function newQuery() {

        if(Auth::guard("admin")->check()){
            return parent::newQuery();
        }

        return parent::newQuery()
            ->where('is_active', '=', 1);
    }

    public function getLabeledTitle($reverse = true){

        $arr = explode(' ',$this->title, 2);
        if($reverse){
            return "<span>".$arr[0]."</span>".(count($arr) > 1 ? " $arr[1]":"");
        }else{
            return $arr[0].(count($arr) > 1 ? " <span>$arr[1]</span>":"");
        }

    }

    public function category()
    {
        return $this->belongsTo('Modules\Page\Entities\PageCategory', 'page_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Admin', 'user_id');
    }

    public function template()
    {
        return $this->belongsTo('Modules\Page\Entities\PageTemplate', 'page_template_id');
    }

    public function scopeActive($query)
    {
        if(Auth::guard("admin")->check() && Auth::guard("admin")->user()->can('page')){
            return $query;
        }
        return $query->where('is_active', 1);
    }

    public function filteredContent()
    {
        $response = str_replace('[Read More]','',$this->content);

        preg_match_all("/\[advertisement_image_link:\d+]/",$response, $foundAds);
        if(count($foundAds)){
            foreach ($foundAds[0] as $foundAd){
                preg_match_all('!\d+!', $foundAd, $matches);

                $adId = implode(' ', $matches[0]);

                $ad = Advertisement::find($adId);

                $link = route('frontend.advertisement.show', [$ad->id, $ad->masked_url_path_name]);

                $replaceString = '<a href="'.$link.'" target="_blank"><img src="'.$ad->image.'" style="width: initial; margin: 0 auto;"></a>';

                $response = str_replace(trim($foundAd), $replaceString, $response);
            }
        }

        preg_match_all("/\[advertisement_text_link:\d+:(.*?)]/",$response, $foundAds);

        if(count($foundAds)){
            foreach ($foundAds[0] as $foundAd){

                $adString = str_replace("[", "", $foundAd);
                $adString = str_replace("]", "", $adString);

                $array = explode(":", $adString);

                $adId = $array[1];
                $linkText = $array[2];

                $ad = Advertisement::find($adId);

                $link = route('frontend.advertisement.show', [$ad->id, $ad->masked_url_path_name]);

                $replaceString = '<a href="'.$link.'" target="_blank">'.$linkText.'</a>';

                $response = str_replace(trim($foundAd), $replaceString, $response);
            }
        }

        return $response;
    }
}
