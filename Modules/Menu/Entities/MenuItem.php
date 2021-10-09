<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Blog\Entities\Blog;
use Modules\Contact\Entities\Contact;
use Modules\Flight\Entities\FlightLandingPage;
use Modules\Page\Entities\Page;
use Loc;
use Modules\Page\Entities\PageCategory;
use Modules\Product\Entities\ProductCategory;

class MenuItem extends Model
{
    protected $fillable = [];

    public function menu()
    {
        return $this->belongsTo('Modules\Menu\Entities\Menu');
    }

    public function getMenuItem(){


        if($this->type == "custom"){
            return $this->getCustom();
        }else if($this->type == "blog"){
            return $this->getBlog();
        }else if($this->type == "page"){
            return $this->getPage();
        }else if($this->type == "page_category"){
            return $this->getPageCategory();
        }else if($this->type == "contact"){
            return $this->getContact();
        }else if($this->type == "page_categories"){
            return $this->getPageCategories();
        }else if($this->type == "flight_landingpage"){
            return $this->getFlightLandingPage();
        }else if($this->type == "product_category"){
            return $this->getProductCategory();
        }else if($this->type == "product_categories"){
            return $this->getProductCategories();
        }

        return null;
    }

    private function getCustom(): ?\stdClass {
        $object = new \stdClass();
        $object->is_list = false;
        $object->is_translate = true;
        $object->title = $this->title;
        if(substr( $this->value, 0, 1 ) === "#"){
            $object->link = rtrim($this->value,'/\\');
        }else{
            $object->link = urldecode(url('tr', rtrim($this->value,'/\\')));
        }


        return $object;
    }

    private function getBlog(): ?\stdClass {
        $blog = Blog::find($this->value);
        if($blog && $blog->hasTranslation()){
            $object = new \stdClass();
            $object->is_list = false;
            $object->title = $blog->title;
            $object->link = route('frontend.blog.show', $blog->slug);
            return $object;
        }else{
            return null;
        }
    }

    private function getPage(): ?\stdClass {
        $page = Page::find($this->value);
        if($page && $page->hasTranslation()){
            $object = new \stdClass();
            $object->is_list = false;
            $object->title = $page->title;
            $object->link = route('frontend.page.show', $page->slug);
            return $object;
        }else{
            return null;
        }
    }

    private function getFlightLandingPage(): ?\stdClass {
        $page = FlightLandingPage::find($this->value);
        if($page){
            $object = new \stdClass();
            $object->is_list = false;
            $object->title = $page->title;
            $object->link = route('frontend.flight.landingpage', $page->slug);
            return $object;
        }else{
            return null;
        }
    }

    private function getPageCategory(): ?\stdClass {
        $category = PageCategory::find($this->value);

        $object = new \stdClass();
        $object->is_list = true;
        $object->title = $this->title;


        $routes = [];
        if($category && $category->pages){
            foreach ($category->pages as $page){
                if($page->hasTranslation()){
                    $routes[] = [
                        'title' => $page->title,
                        'link' => route('frontend.page.show', $page->slug)
                    ];
                }
            }
        }

        $object->links = $routes;
        return $object;

    }

    private function getPageCategories(): ?\stdClass {

        $categoryList = explode(",",$this->value);

        $categories = PageCategory::find($categoryList);

        $object = new \stdClass();
        $object->is_list = true;
        $object->title = $this->title;

        $routes = [];
        if($categories && count($categories)) {
            foreach ($categories as $category) {
                if ($category && $category->pages) {
                    foreach ($category->pages as $page) {
                        if ($page->hasTranslation()) {
                            $routes[] = [
                                'title' => $page->title,
                                'link' => route('frontend.page.show', $page->slug)
                            ];
                        }
                    }
                }
            }
        }

        $object->links = $routes;
        return $object;

    }

    private function getContact(): ?\stdClass {

        $contact = Contact::find($this->value);
        if($contact && $contact->hasTranslation()){
            $object = new \stdClass();
            $object->is_list = false;
            $object->title = $contact->title;
            $object->link = route('frontend.contact.show', $contact->slug);
            return $object;
        }else{
            return null;
        }

    }

    private function getProductCategory(): ?\stdClass {
        $category = PageCategory::find($this->value);

        $object = new \stdClass();
        $object->is_list = true;
        $object->title = $this->title;


        $routes = [];
        if($category && $category->products){
            foreach ($category->products as $product){
                if($product->hasTranslation()){
                    $routes[] = [
                        'title' => $product->title,
                        'link' => "#"//route('frontend.page.show', $page->slug)
                    ];
                }
            }
        }

        $object->links = $routes;
        return $object;

    }

    private function getProductCategories(): ?\stdClass {

        $categoryList = explode(",",$this->value);

        $categories = ProductCategory::find($categoryList);

        $object = new \stdClass();
        $object->is_list = true;
        $object->title = $this->title;

        $routes = [];
        if($categories && count($categories)) {
            foreach ($categories as $category) {
                if ($category->hasTranslation()) {
                    $routes[] = [
                        'title' => $category->name,
                        'link' => route('frontend.product.category', $category->slug)
                    ];
                }
            }
        }

        $object->links = $routes;
        return $object;

    }

}
