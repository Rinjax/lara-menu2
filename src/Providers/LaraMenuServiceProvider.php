<?php namespace Global4Communications\LaraMenu\Providers;

use Global4Communications\LaraMenu\Managers\LaraMenuManager;
use Illuminate\Support\ServiceProvider;

class LaraMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'laramenu');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
