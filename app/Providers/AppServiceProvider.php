<?php

namespace App\Providers;

use App\Models\Character;
use Illuminate\Support\ServiceProvider;

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
        $totalCharacters = Character::Online()->count();

        view()->share(compact('totalCharacters'));
    }
}
