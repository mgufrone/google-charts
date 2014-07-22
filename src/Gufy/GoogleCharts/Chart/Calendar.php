<?php namespace Gufy\GoogleCharts\Chart;

class Calendar extends BaseChart
{
	private $calendarColumns = [];
	public function getPackage()
	{
		return "calendar-chart";
	}

	public function addColumn($name, $type)
	{
		$this->calendarColumns[] = ['name'=>$name, 'type'=>$type];
		return $this;
	}

	public function getCalendarColumns()
	{
		return $this->calendarColumns;
	}
}