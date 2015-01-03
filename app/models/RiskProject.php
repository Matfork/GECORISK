<?php

use Illuminate\Database\Eloquent\Relations\Pivot;

//if we want to use this clase as a pivot modal, we need to extends Pivot , 2 modals and 1 pivot
//otherway we use a normal modal like extending eloquent, 3 modals (pivot modal would be a normal modal, useful we want to manipulate all fields)
class RiskProject extends Eloquent {

	protected $table = 'risks_projects';

	protected $guarded = array('risk_project_id');	

	protected $primaryKey = 'risk_project_id';

	public function getDescription(){
		return $this->description;
	}

	public function getProbability(){
		return $this->probabilty;
	}

	public function getImpact(){
		return $this->impact;
	}

	public function solutions(){
		return $this->hasMany('Solution','risk_project_id');
	}

	public function project(){
		return $this->belongsTo('Project','project_id');
	}

	public function risk(){
		return $this->belongsTo('Risk','risk_id');
	}


	/*public function risk(){
		return $this->belongsToMany('Risk','risks_projects');
	}*/

}