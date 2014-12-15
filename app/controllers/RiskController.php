<?php

class RiskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the risks
        $risks = Risk::all();

        // load the view and pass the risks
        return View::make('risks.index')->with('risks', $risks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/risks/create.blade.php)
        return View::make('risks.create');
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
            'name'       => 'required',
            'description'      => 'required',
            'riskType_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('risk/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {
            // store
            $risk = new Risk;
            $risk->name       = Input::get('name');
            $risk->description      = Input::get('description');
            $risk->riskType_id = Input::get('riskType_id');
            $risk->save();

            // redirect
            Session::flash('message', 'Successfully created Risks!');
            return Redirect::to('risk');
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
		 // get the risk
        $risk = Risk::find($id);
        // show the view and pass the risk to it
        return View::make('risks.show')->with('risk', $risk);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // get the risk
        $risk = Risk::find($id);

        // show the edit form and pass the risk		
       
        return View::make('risks.edit')->with('risk', $risk);
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
            'name'       => 'required',
            'description'      => 'required',
            'riskType_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('risks/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $risk 		  = Risk::find($id);
          	$risk->name       = Input::get('name');
            $risk->description= Input::get('description');
            $risk->riskType_id = Input::get('riskType_id');
            $risk->save();

            // redirect
            Session::flash('message', 'Successfully updated risk!');
            return Redirect::to('risk');
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
        $risk = Risk::find($id);
        $risk->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the risk!');
        return Redirect::to('risk');
	}


}
