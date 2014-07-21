<?php

class LineChartTest extends WorkbenchTestCase
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
		$chart = Line::
		setOptions($options)
		->setWidth(400)
		->setHeight(300)
		->setData($data)
		;

		$content = $chart->render();

		$this->assertEquals('line-chart', $chart->getPackage());
		$this->assertEquals('google-charts::line-chart', $content->getName());
		$this->assertRegExp('/visualization\\.LineChart/', $content->render());
	}
}