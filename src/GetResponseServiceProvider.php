<?php

namespace RudenkoProgrammer\GetResponseLaravel;

use Illuminate\Support\ServiceProvider;

class GetResponseServiceProvider extends ServiceProvider
{

	/**
	 * Register services.
	 *
	 * @return void
	 */
    public function register()
    {
    	/* Plugin configuration file */
	    $configPath = __DIR__ . '/config/get-response-laravel.php';
	    $this->mergeConfigFrom($configPath, 'get-response-laravel');

	    $this->app->singleton('GetResponseHttpClient', function (){
		    return new GetResponseHttpClient();
	    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
	    $configPath = __DIR__ . '/config/get-response-laravel.php';
	    if (function_exists('config_path')) {
		    $publishPath = config_path('get-response-laravel.php');
	    } else {
		    $publishPath = base_path('config/get-response-laravel.php');
	    }
	    $this->publishes([$configPath => $publishPath], 'config');
    }
}
