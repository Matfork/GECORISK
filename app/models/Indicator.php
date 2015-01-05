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

	public static function processData($val,$type){
		
		if (!Session::has('indicators'))
			Session::put('indicators', Indicator::all());

		foreach (Session::get('indicators') as $key => $value) {
			if($val >= $value->min_indicator && $val <= $value->max_indicator && $type==$value->indicator_group) 
				return $value->color_value; 
		}

	}
	
}