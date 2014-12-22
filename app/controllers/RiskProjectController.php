<?php

class riskProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the riskProjects
        $riskProjects = RiskProject::all();
        
       // echo "<pre>";
       // var_dump($riskProjects);
       // die;

        // load the view and pass the riskProjects
        return View::make('risksProjects.index')->with('riskProjects', $riskProjects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/riskProjects/create.blade.php)
        return View::make('risksProjects.create');
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
            'description'      => 'required',
            'risk_id'      => 'required',
            'project_id'      => 'required',
            'impact'      => 'required',
            'probability'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('riskProject/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {
            // store
            $riskProject = new RiskProject;
            $riskProject->description      = Input::get('description');
            $riskProject->impact      = Input::get('impact');
            $riskProject->probability = Input::get('probability');
            $riskProject->risk_id	 = Input::get('risk_id');
            $riskProject->project_id  = Input::get('project_id');
            $riskProject->save();

            // redirect
            Session::flash('message', 'Successfully created riskProjects!');
            return Redirect::to('riskProject');
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
		 // get the riskProject
        $riskProject = RiskProject::find($id);
        // show the view and pass the riskProject to it
        return View::make('risksProjects.show')->with('riskProject', $riskProject);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // get the riskProject
        $riskProject = RiskProject::find($id);

        // show the edit form and pass the riskProject		
       
        return View::make('risksProjects.edit')->with('riskProject', $riskProject);
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
            'description'      => 'required',
            'risk_id'      => 'required',
            'project_id'      => 'required',
            'impact'      => 'required',
            'probability'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('risksProjects/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $riskProject 		  = RiskProject::find($id);
           	$riskProject->description      = Input::get('description');
            $riskProject->impact      = Input::get('impact');
            $riskProject->probability = Input::get('probability');
            $riskProject->risk_id	 = Input::get('risk_id');
            $riskProject->project_id  = Input::get('project_id');
            $riskProject->save();


            // redirect
            Session::flash('message', 'Successfully updated riskProject!');
            return Redirect::to('riskProject');
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
        $riskProject = RiskProject::find($id);
        $riskProject->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the riskProject!');
        return Redirect::to('riskProject');
	}


}