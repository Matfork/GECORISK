<?php

class Document extends Eloquent {

	protected $table = 'documents';

	protected $guarded = array('document_id');	

	protected $primaryKey = 'document_id';

	public function getName(){
		return $this->name;
	}

	public function getPathFile(){
		return $this->pathFile;
	}

	public function getNameFile(){
		return $this->nameFile;
	}

	public function getDescription(){
		return $this->description;
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

	public function getCompleteFileRoute(){
		return $this->pathFile.$this->nameFile;
	}

	public function getUrlByType($docType){

		$url = '../uploads/gecorisk/';

		switch ($docType) {
			case '1':
				return $url.'mitigations/';
				break;
			case '2':
				return $url.'contingencies/';
				break;
			case '3':
				return $url.'learnedlessons/';
				break;
			case '4':
				return $url.'others/';
				break;
			default:
				return $url.'others/';
				break;
		}
	}
}