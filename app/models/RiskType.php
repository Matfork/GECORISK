<?php

class RiskType extends Eloquent {

	protected $table = 'risk_types';

	protected $guarded = array('riskType_id');	

	//laverel tends to use field id as default, that's why we explicit use primeryKey to redifine the key
	protected $primaryKey = 'riskType_id';

	public function risks(){
		return $this->hasMany('Risk','riskType_id');
	}

	public function getName(){
		return $this->name;
	}
	
}