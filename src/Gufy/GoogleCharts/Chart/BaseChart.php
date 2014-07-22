<?php namespace Gufy\GoogleCharts\Chart;

class BaseChart
{
	protected $id;
	protected $options=[];
	protected $data=[];
	protected $width;
	protected $height;	
	protected $columns=[];


	public function __construct()
	{
		$this->id = $this->setId();
	}

	public function setId()
	{
		return uniqid();
	}

	public function getId()
	{
		return $this->id;
	}

	public function render()
	{
		$id = $this->id;
		$options = $this->getOptions();
		$data = $this->processData();
		$width = $this->getWidth();
		$height = $this->getHeight();
		$chart = $this;
		
		return \View::make('google-charts::'.$this->getPackage(), compact(
			'id',
			'data',
			'options',
			'width',
			'height',
			'chart'
		));
	}

	public function setWidth($width)
	{
		if(0 == $width)
			$width = 'auto';
		$this->width = $width;
		return $this;
	}

	public function setHeight($height)
	{
		if(0 == $height)
			$height = 'auto';
		$this->height = $height;
		return $this;
	}

	public function setData($data=[])
	{
		$this->data = $data;
		return $this;
	}

	public function setOptions($options, $value='')
	{
		if(is_array($options))
			$this->options = $options;
		else
			$this->options[$options] = $value;
		return $this;
	}

	public function getOptions()
	{
		return $this->options;
	}

	public function getWidth()
	{
		return $this->width;
	}

	public function getHeight()
	{
		return $this->height;
	}


	protected function processData()
	{
		$columns = $this->getColumns();
		if(!empty($columns))
			array_unshift($this->data, $columns);
		return $this->data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function getPackage()
	{
		return '';
	}

	public function setColumns($columns=[])
	{
		$this->columns = $columns;
		return $this;
	}
	public function getColumns()
	{
		return $this->columns;
	}
}