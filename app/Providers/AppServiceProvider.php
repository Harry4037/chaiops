<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Session;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('*', function($view) {
            $cartCount = Cart::where("session_id", session()->getId())->count();
            $view->with(['cartCount' => $cartCount]);
        });
    }

}
