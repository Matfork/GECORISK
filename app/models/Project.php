<?php

use Illuminate\Database\Eloquent\Relations\Pivot;

class Project extends Eloquent {

	protected $table = 'projects';

	protected $guarded = array('project_id');	

	protected $primaryKey = 'project_id';

	public function getName(){
		return $this->name;
	}

	public function getDescription(){
		return $this->description;
	}

	public function getBeginDate(){
		return date('d/m/Y', strtotime($this->begin_date));
	}

	public function getEndDate(){
			return date('d/m/Y', strtotime($this->end_date));
	}

	public function getFinished(){
		return ($this->finished==0? "No" : "Yes");
	}

	public function setBeginDate($date){
		$this->begin_date = $date;
	}

	public function setEndDate($date){
		$this->end_date = $date;
	}

	public function risks(){
		return $this->belongsToMany('Risk','risks_projects');
	}

	public function riskProjects(){
		return $this->hasMany('RiskProject','project_id');
	}

	public function projectType(){
		return $this->belongsTo('ProjectType','projectType_id');
	}
}