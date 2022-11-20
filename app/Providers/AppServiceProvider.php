<?php

namespace App\Providers;

use App\Models\Character;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View AS ViewContract;
use View;

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
        View::composer('*', function (ViewContract $view) {
            static $totalCharacters = null;

            if ($totalCharacters === null) {
                $totalCharacters = Character::query()
                    ->online()
                    ->count();
            }

            $view->with(compact('totalCharacters'));
        });
    }
}
