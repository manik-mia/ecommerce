<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cateroires = Category::orderBy('category_name_en','ASC')->get();
        View::share( 'categories', $cateroires );
        $subCategories=SubCategory::orderBy('subcategory_name_en','ASC')->get();
        View::share('subCategories', $subCategories);
        $subSubCategories=SubSubCategory::orderBy('subsubcategory_name_en','ASC')->get();
        View::share('subSubCategories', $subSubCategories);
    }
}
