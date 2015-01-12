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

	public static function processData($val,$type,$rbg = FALSE){
		
		if (!Session::has('indicators'))
			Session::put('indicators', Indicator::all());

		foreach (Session::get('indicators') as $key => $value) {
			if($val >= $value->min_indicator && $val <= $value->max_indicator && $type==$value->indicator_group){
				if($rbg)
					switch ($value->color_value) {
						case 'danger' : return "#d9534f";
						case 'warning': return "#f0ad4e";
						case 'success': return "#5cb85c";	
						default 	  :	return "#000";
					}
				else
					return $value->color_value;
			}
				 
		}

	}
	
}