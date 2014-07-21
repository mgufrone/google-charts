<?php namespace Gufy\GoogleCharts\Facade;
use Illuminate\Support\Facades\Facade;

class Bar extends Facade
{

	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() { return 'Gufy\\GoogleCharts\\Chart\\Bar'; }
}