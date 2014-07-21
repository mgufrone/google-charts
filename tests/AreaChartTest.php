<?php

class AreaChartTest extends WorkbenchTestCase
{
	public function testBasic()
	{
		$options = ['xAxis'=>['title'=>'Hello World']];
		$data = [
			['2004', 500],
			['2005', 600],
		];
		$columns = [
			'Year',
			'Expenses',
		];
		$chart = Area::
		setOptions($options)
		->setWidth(400)
		->setHeight(300)
		->setData($data)
		;

		$content = $chart->render();

		$this->assertEquals('area-chart', $chart->getPackage());
		$this->assertEquals('google-charts::area-chart', $content->getName());
		$this->assertRegExp('/visualization\\.AreaChart/', $content->render());
	}
}