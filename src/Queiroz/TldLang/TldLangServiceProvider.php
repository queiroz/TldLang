<?php namespace Queiroz\TldLang;

use Illuminate\Support\ServiceProvider;

class TldLangServiceProvider extends ServiceProvider {

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
		$this->package('queiroz/tld-lang');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app['TldLang'] = $this->app->share(function() {
			
			return new TldLang();

		});

		$this->app->booting(function() {
		  
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();

		  $loader->alias('TldLang', 'Queiroz\TldLang\Facades\TldLang');

		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('TldLang');
	}

}