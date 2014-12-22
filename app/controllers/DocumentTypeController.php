<?php

class DocumentTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the documentTypes
        $documentTypes = DocumentType::all();

        // load the view and pass the documentTypes
        return View::make('documentTypes.index')->with('documentTypes', $documentTypes);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/documentTypes/create.blade.php)
        return View::make('documentTypes.create');
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
            'name'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('documentType/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {

            $documentType = new DocumentType;
            $documentType->name 	= Input::get('name');
            
            $documentType->save();

			// redirect
            Session::flash('message', 'Successfully created documentType!');
            return Redirect::to('documentType');
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
			 // get the documentType
        $documentType = DocumentType::find($id);
        // show the view and pass the documentType to it
        return View::make('documentTypes.show')->with('documentType', $documentType);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the documentType
        $documentType = DocumentType::find($id);

        // show the edit form and pass the documentType
        return View::make('documentTypes.edit')->with('documentType', $documentType);

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
            'name'      => 'required',
        );
     	$validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('documentTypes/' . $id . '/edit')
                ->withErrors($validator);
        } else {

            // store
            $documentType = DocumentType::find($id);
 			$documentType->name 	= Input::get('name');
            $documentType->save();

            // redirect
            Session::flash('message', 'Successfully updated documentType!');
            return Redirect::to('documentType');
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
        $documentType = DocumentType::find($id);
        $documentType->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the documentType!');
        return Redirect::to('documentType');
	
	}


}
