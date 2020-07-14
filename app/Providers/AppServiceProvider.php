<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Product;
use App\Item;

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
        Blade::directive('currency', function ($expression) {
            return "IDR <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');

        view()->composer('*', function ($view) {
            $products = Product::all();
            $top_items = Item::where('top', '!=', 0)->orderBy('top', 'ASC')->get();
            $view->with(['products' => $products, 'top_items' => $top_items]);

        });
    }
}
