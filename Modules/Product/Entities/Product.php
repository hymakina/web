<?php

namespace Modules\Product\Entities;

use App\Traits\ImageUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Koddea\Localize\Traits\ModelTranslation;
use Modules\Advertisement\Entities\Advertisement;

class Product extends Model
{
    use ImageUploader;
    use ModelTranslation;

    public $translatedAttributes = ['title', 'slug', 'content', 'meta_title', 'meta_keywords', 'meta_description'];
    protected $fillable = [];

    public function newQuery() {

        if(Auth::guard("admin")->check()){
            return parent::newQuery();
        }

        return parent::newQuery()
            ->where('is_active', '=', 1);
    }

    public static function boot()
    {
        parent::boot();

        Product::deleting(function($product)
        {
            foreach ($product->images as $image)
            {
                $image->delete();
            }
        });
    }

    public function aa(){
        return $this->belongsToMany('Modules\Product\Entities\ProductOptionKey','product_product_option_keys', 'product_id', 'product_option_key_id')->withPivot('value');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductProductAttribute::class);
    }

    public function categories() {
        return $this->belongsToMany('Modules\Product\Entities\ProductCategory', 'product_product_categories');
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
