<?php

class BubbleChartTest extends WorkbenchTestCase
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
		$chart = Bubble::
		setOptions($options)
		->setWidth(400)
		->setHeight(300)
		->setData($data)
		;

		$content = $chart->render();

		$this->assertEquals('bubble-chart', $chart->getPackage());
		$this->assertEquals('google-charts::bubble-chart', $content->getName());
		$this->assertRegExp('/visualization\\.BubbleChart/', $content->render());
	}
}