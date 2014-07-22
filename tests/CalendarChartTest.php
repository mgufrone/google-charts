<?php

class CalendarChartTest extends WorkbenchTestCase
{
	public function testBasic()
	{
		$options = ['xAxis'=>['title'=>'Hello World']];
		$data = [
			[ strtotime("2012-3-13"), 37032 ],
			[ strtotime("2012-3-14"), 38024 ],
			[ strtotime("2012-3-15"), 38024 ],
			[ strtotime("2012-3-16"), 38108 ],
			[ strtotime("2012-3-17"), 38229 ],
			[ strtotime("2013-9-4"), 38177 ],
			[ strtotime("2013-9-5"), 38705 ],
			[ strtotime("2013-9-12"), 38210 ],
			[ strtotime("2013-9-13"), 38029 ],
			[ strtotime("2013-9-19"), 38823 ],
			[ strtotime("2013-9-23"), 38345 ],
			[ strtotime("2013-9-24"), 38436 ],
			[ strtotime("2013-9-30"), 38447 ]
		];
		$columns = [
			'Year',
			'Expenses',
		];
		$chart = Calendar::
		setOptions($options)
		->setWidth(400)
		->setHeight(300)
		->addColumn('Date', 'date')
		->addColumn('Expenses', 'number')
		->setData($data)
		;

		$content = $chart->render();
		$rendered_content = $content->render();

		$this->assertEquals('calendar-chart', $chart->getPackage());
		$this->assertEquals('google-charts::calendar-chart', $content->getName());
		$this->assertRegExp('/visualization\\.Calendar/', $rendered_content);
		$this->assertRegExp('/{packages:\["calendar"\]}/', $rendered_content);
		$this->assertRegExp('/DataTable/', $rendered_content);
	}
}