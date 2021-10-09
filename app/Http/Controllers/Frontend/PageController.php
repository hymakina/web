<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Auth;

//Importing laravel-permission models
use Illuminate\Support\Facades\View;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;
use Modules\Page\Entities\Page;
use Modules\Page\Entities\PageCategory;
use Modules\Widget\Entities\WidgetContainer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class PageController extends Controller {

    public function show(Request $request, Page $page) {
        return view('frontend.page.view', compact('page'));
    }

    public function index(PageCategory $category) {
        $pages = Page::translatedIn(\Loc::getDefaultLocale())->where('category_id', $category->id)->get();
        return view('frontend.page.index', compact('pages'));
    }

}
