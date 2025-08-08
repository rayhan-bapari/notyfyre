<?php

namespace RayhanBapari\Notyfyre;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class NotyfyreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('notyfyre', function ($app) {
            return new Notyfyre();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/notyfyre.php',
            'notyfyre'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notyfyre');

        $this->publishes([
            __DIR__ . '/../config/notyfyre.php' => config_path('notyfyre.php'),
        ], 'notyfyre-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/notyfyre'),
        ], 'notyfyre-views');

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/notyfyre'),
        ], 'notyfyre-assets');

        // Register Blade directive
        Blade::directive('notyfyreScripts', function () {
            return "<?php echo view('notyfyre::scripts')->render(); ?>";
        });

        Blade::directive('notyfyreStyles', function () {
            return "<?php echo view('notyfyre::styles')->render(); ?>";
        });
    }
}
