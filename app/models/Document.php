<?php

class Document extends Eloquent {

	protected $table = 'documents';

	protected $guarded = array('document_id');	

	protected $primaryKey = 'document_id';


	public function getPathFile(){
		return $this->pathFile;
	}

	public function getNameFile(){
		return $this->nameFile;
	}

	public function getDocumentType_id(){
		return $this->documentType_id;
	}

	public function getSolution_id(){
		return $this->solution_id;
	}

	public function solution(){
		return $this->belongsTo('Solution','solution_id');
	}

	public function documentType(){
		return $this->belongsTo('DocumentType','documentType_id');
	}
}