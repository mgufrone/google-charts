<?php

class BaseTest extends WorkbenchTestCase
{
	public function testConfiguration()
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

		$this->assertEquals($options, $chart->getOptions());
		$this->assertEquals($data, $chart->processData());
		$this->assertEquals(400, $chart->getWidth());
		$this->assertEquals(300, $chart->getHeight());
		$this->assertRegExp('/'.$chart->getId().'/', $content->render());
		$this->assertEquals('line-chart', $chart->getPackage());
	}

	public function checkOption()
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
		->setWidth(0)
		->setHeight(0)
		->setData($data)
		;

		$this->assertEquals('auto', $chart->getWidth());
		$this->assertEquals('auto', $chart->getHeight());


		$chart = Line::
		setOptions($options)
		->setWidth('0')
		->setHeight('0')
		->setData($data)
		;

		$this->assertEquals('auto', $chart->getWidth());
		$this->assertEquals('auto', $chart->getHeight());
	}
}