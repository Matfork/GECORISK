<?php

class DocumentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the documents
        $documents = Document::all();

        // load the view and pass the documents
        return View::make('logicViews.documents.index')->with('documents', $documents);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/documents/create.blade.php)
        return View::make('logicViews.documents.create');
	}


	public function indexFilter($solution_id)
	{
		$documents = Document::where('solution_id', '=', $solution_id)->get();
		
		if(count($documents)>0){
      		return View::make('logicViews.documents.index')->with('documents', $documents);
		}else{
			$solution = Solution::find($solution_id);
      		return Redirect::to('solution/index/'.$solution->risksProjects->risk_project_id);
        }

	}

	public function createFilter($solution_id)
	{
		return View::make('logicViews.documents.create')
            ->with('filterSolution', $solution_id);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			 // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'documentToUpload' =>  'required | mimes:jpeg,doc,docx,txt,pdf | max: 10485760' //10mb as max 
        );

        //var_dump(Input::all());die;
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('document/create/'.Input::get('solution_id'))->withErrors($validator);
   		} else {
			
		/*	var_dump($file->getFilename());
			var_dump($file->getClientOriginalName());
			var_dump($file->getClientSize());
			var_dump($file->getClientMimeType());
			var_dump($file->guessClientExtension());
			var_dump($file->getRealPath());*/

			$file = Input::file('documentToUpload');
			
			$filename = value(function() use ($file){
		        $filename = str_random(10) . '.' . $file->getClientOriginalExtension();
		        return strtolower($filename);
		    });

			$document = new Document;
			$path = $document->getUrlByType(Input::get('documentType_id'));
			
			if($file->move($path, $filename)){
				$document->description 	= Input::get('description');
				$document->pathFile 	= $path;
	            $document->nameFile 	= $filename;
	            $document->documentType_id 	= Input::get('documentType_id');
	            $document->solution_id 	= Input::get('solution_id');
	            $document->save();
	            Session::flash('message', 'The document was created Successfully!');
			}else{
				Session::flash('message', 'There was an error uploading the selected file!');
			}
			// redirect
             return Redirect::to('document/index/'.$document->solution_id);
       }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			 // get the document
        $document = Document::find($id);
        // show the view and pass the document to it
        return View::make('logicViews.documents.show')->with('document', $document);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the document
        $document = Document::find($id);

        // show the edit form and pass the document
        return View::make('logicViews.documents.edit')->with('document', $document)
        ->with('filterSolution',$document->solution_id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'documentToUpload' =>  'mimes:jpeg,doc,docx,txt,pdf | max: 10485760' //10mb as max 
        );

        $validator = Validator::make(Input::all(), $rules);
			
        // process the login
        if ($validator->fails()) {
             return Redirect::to('document/' . $id . '/edit')->withErrors($validator); //->withInput(Input::except('documentToUpload'));
        } else {

        	$document = Document::find($id);
        	$file = Input::file('documentToUpload');

        	if(empty($file)){
        		$filename = $document->getNameFile();


         		if(Input::get('documentType_id') != $document->getDocumentType_id){
					//if there weren't changes on file but we DO change the documentType_id, we need to move the current file to another location
					// depending the documentType_id, and we also upload the normal data in database,
        			$path = $document->getUrlByType(Input::get('documentType_id'));

        			if ( !File::move($document->getCompleteFileRoute(), $path.$filename))
					{
					   Session::flash('message', 'ERROR Moving File!');
					}else{
						$document->description 	= Input::get('description');
						$document->pathFile 	= $path;
			            $document->nameFile 	= $filename;
			            $document->documentType_id 	= Input::get('documentType_id');
			            $document->solution_id 	= Input::get('solution_id');
			            $document->save();
			            Session::flash('message', 'The document was updated Successfully!');
					}
        		}else{
        			//if there weren't changes on file nor the documentType_id, we just skip those fields when updating
        			//we just upload the normal data in database
        			$document->description 	= Input::get('description');
		            $document->solution_id 	= Input::get('solution_id');
		            $document->save();
		            Session::flash('message', 'The document was updated Successfully!');
        		}
			}else{
				//if we are uploading a new file, we need first delete the current file and upload the new one
				// and also update the info in database.

				$filename = value(function() use ($file){
			        $filename = str_random(10) . '.' . $file->getClientOriginalExtension();
			        return strtolower($filename);
			    });

				
				if (!File::delete($document->getCompleteFileRoute()))
		      	{
			    	Session::flash('message', 'ERROR deleted the File!');
			    }else{		
					$path = $document->getUrlByType(Input::get('documentType_id'));
					
					if($file->move($path, $filename)){
						$document->description 	= Input::get('description');
						$document->pathFile 	= $path;
			            $document->nameFile 	= $filename;
			            $document->documentType_id 	= Input::get('documentType_id');
			            $document->solution_id 	= Input::get('solution_id');
			            $document->save();
			            Session::flash('message', 'The document was updated Successfully!');
					}else{
						Session::flash('message', 'There was an error uploading the selected file!');
					}
				}
			}
			
			// redirect
            return Redirect::to('document');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
        $document = Document::find($id);

		if (!File::delete($document->getCompleteFileRoute()))
      	{
	      	Session::flash('message', 'ERROR deleted the File!');
      	}else{
        	$document->delete();
        	$cont = Document::where('solution_id', '=', $document->solution->solution_id)->get();

	        if(count($cont)>0)
	      		Session::flash('message', 'Document deleted Successfully!');
	        else
	      		Session::flash('message', 'Document deleted Successfully, no more documents are left for: </br> Risk: '
	      			.$document->solution->risksProjects->risk->name.
	      			'</br> Project: '.$document->solution->risksProjects->project->name.
	      			'</br> Solution: '.$document->solution->description);
		}    
        // redirect
        return $this->indexFilter($document->solution->solution_id);	
	}


}
