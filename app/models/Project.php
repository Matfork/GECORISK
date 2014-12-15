<?php

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
}