<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //truyen du lieu cho header o tat ca trang
        view()->composer('user.layout.header', function ($view) {
        $categories = DB::table('Category')
                    ->select('CategoryID', 'CategoryName')
                    ->take(5)
                    ->get();

        $formattedCategories = [];

        //tim genre cho moi category
        foreach ($categories as $category) {
            $categoryId = $category->CategoryID;
            $categoryName = $category->CategoryName;

            $genres = DB::table('Genre')
                        ->where('CategoryID', $categoryId)
                        ->select('GenreID', 'GenreName')
                        ->take(5)
                        ->get();

            $formattedCategories[] = [
                'id' => $categoryId,
                'name' => $categoryName,
                'genres' => $genres,
            ];
        }
        $view->with('formattedCategories', $formattedCategories);
        });
    }
}
