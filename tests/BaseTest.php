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
		->setColumns($columns)
		;

		$content = $chart->render();
		array_unshift($data, $columns);
		$this->assertEquals($options, $chart->getOptions());
		$this->assertEquals($data, $chart->getData());
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
		$yAxis = ['title'=>'Screenshot'];
		$chart->setOptions('yAxis',$yAxis);
		$this->assertEquals(array_merge($options, $yAxis), $chart->getOptions());
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

	public function testBasicCoverage()
	{
		$class = new \Gufy\GoogleCharts\Chart\BaseChart;
		$this->assertEquals('', $class->getPackage());

		$binding_class = $this->app['Line'];
		$this->assertEquals('Gufy\GoogleCharts\Facade\Line', get_class($binding_class));
	}
}