<?php namespace Cloudoki\FrontQueue;

use Illuminate\Support\ServiceProvider;
use Cloudoki\FrontQueue\FrontQueue;
use Cloudoki\FrontQueue\FrontLocalQueue;


class FrontQueueServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app['frontqueue'] = $this->app->share(function($app)
        {
            return env('APP_ENV', 'development') == 'local'?
            	
            	new FrontLocalQueue():
            	new FrontQueue();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['frontqueue'];
	}

}