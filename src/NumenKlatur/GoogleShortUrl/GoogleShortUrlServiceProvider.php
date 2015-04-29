<?php namespace NumenKlatur\GoogleShortUrl;

use Illuminate\Support\ServiceProvider;

class GoogleShortUrlServiceProvider extends ServiceProvider {

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
		$this->package('numenklatur/google-short-url');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['googleShortUrl'] = $this->app->share(function($app) {
			return new GoogleShortUrlApi;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
