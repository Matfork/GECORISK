<?php

class DocumentType extends Eloquent {

	protected $table = 'document_types';

	protected $guarded = array('documentType_id');	

	protected $primaryKey = 'documentType_id';


	public function document(){
		return $this->hasMany('Document','document_id');
	}

	public function getName(){
		return $this->name;
	}
	
}