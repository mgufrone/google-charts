<?php namespace Gufy\GoogleCharts\Chart;

class BaseChart
{
	public $id;
	public $options=[];
	public $data=[];
	public $width;
	public $height;
	public function __construct()
	{
		$this->id = uniqid();
	}
	public function render()
	{
		$id = $this->id;
		$options = $this->options;
		$data = $this->processData();
		$width = $this->width;
		$height = $this->height;
		return \View::make('google-charts::'.$this->getPackage(), compact(
			'id',
			'data',
			'options',
			'width',
			'height'
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

	public function processData()
	{
		return $this->data;
	}

	public function getPackage()
	{
		return '';
	}
}