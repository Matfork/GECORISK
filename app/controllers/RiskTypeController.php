<?php

class RiskTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the riskTypes
        $riskTypes = RiskType::all();

        // load the view and pass the riskTypes
        return View::make('riskTypes.index')->with('riskTypes', $riskTypes);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/riskTypes/create.blade.php)
        return View::make('riskTypes.create');
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
            return Redirect::to('riskType/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {

            $riskType = new RiskType;
            $riskType->name 	= Input::get('name');
            
            $riskType->save();

			// redirect
            Session::flash('message', 'Successfully created riskType!');
            return Redirect::to('riskType');
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
			 // get the riskType
        $riskType = RiskType::find($id);
        // show the view and pass the riskType to it
        return View::make('riskTypes.show')->with('riskType', $riskType);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the riskType
        $riskType = RiskType::find($id);

        // show the edit form and pass the riskType
        return View::make('riskTypes.edit')->with('riskType', $riskType);

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
            return Redirect::to('riskTypes/' . $id . '/edit')
                ->withErrors($validator);
        } else {

            // store
            $riskType = RiskType::find($id);
 			$riskType->name 	= Input::get('name');
            $riskType->save();

            // redirect
            Session::flash('message', 'Successfully updated riskType!');
            return Redirect::to('riskType');
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
        $riskType = RiskType::find($id);
        $riskType->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the riskType!');
        return Redirect::to('riskType');
	
	}


}
