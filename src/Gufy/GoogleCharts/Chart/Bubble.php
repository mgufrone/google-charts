<?php namespace Gufy\GoogleCharts\Chart;

class Bubble extends BaseChart
{
	public $columns=[];

	public function processData()
	{
		array_unshift($this->data, $this->columns);
		return $this->data;
	}

	public function setColumns($columns=[])
	{
		$this->columns = $columns;
		return $this;
	}

	public function getPackage()
	{
		return "bubble-chart";
	}
}