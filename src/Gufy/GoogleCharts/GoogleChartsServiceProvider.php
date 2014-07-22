<?php namespace Gufy\GoogleCharts;

use Illuminate\Support\ServiceProvider;

class GoogleChartsServiceProvider extends ServiceProvider {

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
		$this->package('gufy/google-charts');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$classList = [
			'Area',
			'Bar',
			'Bubble',
			'Calendar',
			'Line',
		];
		foreach ($classList as $className) {
			$this->app[$className] = $this->app->share(function() use($className){
				
				return new $className();

			});
			$this->app->booting(function() use($className)
			{
				$loader = \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias($className, 'Gufy\GoogleCharts\Facade\\'.$className);
			});
		}
	}



}
