<?php

class ProjectType extends Eloquent {

	protected $table = 'project_types';

	protected $guarded = array('projectType_id');	

	//laverel tends to use field id as default, that's why we explicit use primeryKey to redifine the key
	protected $primaryKey = 'projectType_id';

	public function projects(){
		return $this->hasMany('Project','projectType_id');
	}

	public function getName(){
		return $this->name;
	}
	
}