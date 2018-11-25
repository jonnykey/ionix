<?php

namespace JohnnyC\Ionix;

use Illuminate\Support\ServiceProvider;

class IonixServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'johnnyc');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'johnnyc');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ionix.php', 'ionix');

        // Register the service the package provides.
        $this->app->singleton('ionix', function ($app) {
            return new Ionix;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ionix'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/ionix.php' => config_path('ionix.php'),
        ], 'ionix.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/johnnyc'),
        ], 'ionix.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/johnnyc'),
        ], 'ionix.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/johnnyc'),
        ], 'ionix.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
