<?php

class WorkbenchTestCase extends Orchestra\Testbench\TestCase 
{
	protected function getPackageProviders()
    {
        return array('Gufy\GoogleCharts\GoogleChartsServiceProvider');
    }
}