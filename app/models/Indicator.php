<?php

class Indicator extends Eloquent {

	protected $table = 'indicators';

	protected $guarded = array('indicator_id');	

	protected $primaryKey = 'indicator_id';

	public function getMinIndicator(){
		return $this->min_indicator;
	}

	public function getMaxIndicator(){
		return $this->max_indicator;
	}

	public function getColor(){
		return $this->color;
	}

	
}