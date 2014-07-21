<?php

class BarChartTest extends WorkbenchTestCase
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
		$chart = Bar::
		setOptions($options)
		->setWidth(400)
		->setHeight(300)
		->setData($data)
		;

		$content = $chart->render();

		$this->assertEquals('bar-chart', $chart->getPackage());
		$this->assertEquals('google-charts::bar-chart', $content->getName());
		$this->assertRegExp('/visualization\\.BarChart/', $content->render());
	}
}