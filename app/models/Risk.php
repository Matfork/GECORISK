<?php

class Risk extends Eloquent {

	protected $table = 'risks';

	protected $guarded = array('risk_id');	

	protected $primaryKey = 'risk_id';

	private $frecuency;

	private $totalProjectsAssociated;

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

	public function setFrecuency($frecuency){
		$this->frecuency = $frecuency;
	}

	public function getFrecuency(){
		return $this->frecuency;
	}

	public function setTotalProjectsAssociated($totalProjectsAssociated){
		$this->totalProjectsAssociated = $totalProjectsAssociated;
	}

	public function getTotalProjectsAssociated(){
		return $this->totalProjectsAssociated;
	}

	

/*	public function projects(){
		return $this->belongsToMany('Project','risks_projects','risk_id','project_id')
		->withPivot('risk_project_id','probability','impact')
		->leftJoin('solutions','risks_projects.risk_project_id','=','solutions.risk_project_id')
		->select('risks_projects.description','solutions.description as sol_description');
	}
*/
	public function riskProjects(){
		return $this->hasMany('RiskProject','risk_id');
	}
	
}