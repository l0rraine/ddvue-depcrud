<?php

namespace DDVue\DepCRUD;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DepCRUDServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // LOAD THE CONFIG
        $this->mergeConfigFrom(
            __DIR__ . '/config/ddvue/depcrud.php', 'ddvue.depcrud'
        );


        // LOAD THE VIEWS
        // - first the published views (in case they have any changes)
        $this->loadViewsFrom(resource_path('views/vendor/ddvue/depcrud'), 'depcrud');
        // - then the stock views that come with the package, in case a published view might be missing
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'depcrud');


        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/ddvue/depcrud'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__ . '/config/ddvue' => config_path('ddvue'),
        ], 'ddvue');

    }

    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'DDVue\DepCRUD\app\Http\Controllers'], function ($router) {
            \Route::group(['prefix' => config('ddvue.adminpanel.route_prefix', 'Crud.Department'), 'middleware' => config('ddvue.adminpanel.admin_auth_middleware',['auth'])], function () {
                require __DIR__.'/routes/depcrud.php';
            });
        });
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setupRoutes($this->app->router);
    }
}
