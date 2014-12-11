<?php

class Risk extends Eloquent {

	protected $table = 'risks';

	protected $guarded = array('risk_id');	

	protected $primaryKey = 'risk_id';


	public function riskType(){
		return $this->belongsTo('RiskType','riskType_id');
	}

	public function getName(){
		return $this->name;
	}

	public function getDescription(){
		return $this->description;
	}

	public function getRiskType_id(){
		return $this->riskType_id;
	}

	
}