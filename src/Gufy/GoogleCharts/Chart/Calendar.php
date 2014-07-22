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

	protected function processData()
	{
		$columns = $this->getCalendarColumns();
		$column_types = [];
		array_map(function($column) use(&$column_types){
			$column_types[] = $column['type'];
		}, $columns);

		foreach($this->data as &$row)
		{
			if(count($row)!=count($column_types))
				throw new \Exception("Invalid Row.");
			foreach($column_types as $key=>$type)
			{
				$this->changeValue($type, $row[$key]);
			}
		}
		return $this->data;
	}

	private function changeValue($type, &$value)
	{
		if('date' == $type)
			$value = "new Date(".date('Y, n, d',strtotime($value)).")";

		if(in_array($value, ['integer']))
			$value = intval($value);

		if(in_array($value, ['number']))
			$value = floatval($value);
	}

}