<?php

class Solution extends Eloquent {

	protected $table = 'solutions';

	protected $guarded = array('solution_id');	

	protected $primaryKey = 'solution_id';


	/*public function riskProject(){
		return $this->belongsTo('RiskProject','risk_project_id');
	}*/

	public function getDescription(){
		return $this->description;
	}

	public function getRiskProject_id(){
		return $this->risk_project_id;
	}

	public function documents(){
		return $this->hasMany('Document','solution_id'); 
	}

	public function risksProjects(){
		return $this->belongsTo('RiskProject','risk_project_id');
	}	
	
}