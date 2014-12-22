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
        return View::make('documents.index')->with('documents', $documents);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/documents/create.blade.php)
        return View::make('documents.create');
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
            'pathFile'      => 'required',
            'nameFile'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('document/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {

			$file = Input::file('documentToUpload');
			var_dump($file);
			die;

            $document = new Document;
            $document->pathFile 	= Input::get('pathFile');
            $document->nameFile 	= Input::get('nameFile');
            $document->documentType_id 	= Input::get('documentType_id');
            $document->solution_id 	= Input::get('solution_id');
           
            $document->save();

			// redirect
            Session::flash('message', 'Successfully created document!');
            return Redirect::to('document');
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
        return View::make('documents.show')->with('document', $document);
	
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
        return View::make('documents.edit')->with('document', $document);

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
            'pathFile'      => 'required',
            'nameFile'      => 'required',
        );
     	$validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('documents/' . $id . '/edit')
                ->withErrors($validator);
        } else {

            // store
            $document = Document::find($id);
 			$document->pathFile 	= Input::get('pathFile');
            $document->nameFile 	= Input::get('nameFile');
            $document->documentType_id 	= Input::get('documentType_id');
            $document->solution_id 	= Input::get('solution_id');
        	$document->save();

            // redirect
            Session::flash('message', 'Successfully updated document!');
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
        $document->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the document!');
        return Redirect::to('document');
	
	}


}
