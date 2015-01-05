<?php

class ProjectTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the projectTypes
        $projectTypes = ProjectType::all();

        // load the view and pass the projectTypes
        return View::make('logicViews.projectTypes.index')->with('projectTypes', $projectTypes);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/projectTypes/create.blade.php)
        return View::make('logicViews.projectTypes.create');
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
            return Redirect::to('projectType/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {

            $projectType = new ProjectType;
            $projectType->name 	= Input::get('name');
            
            $projectType->save();

			// redirect
            Session::flash('message', 'Successfully created projectType!');
            return Redirect::to('projectType');
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
			 // get the projectType
        $projectType = ProjectType::find($id);
        // show the view and pass the projectType to it
        return View::make('logicViews.projectTypes.show')->with('projectType', $projectType);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the projectType
        $projectType = ProjectType::find($id);

        // show the edit form and pass the projectType
        return View::make('logicViews.projectTypes.edit')->with('projectType', $projectType);

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
            return Redirect::to('projectType/' . $id . '/edit')
                ->withErrors($validator);
        } else {

            // store
            $projectType = ProjectType::find($id);
 			$projectType->name 	= Input::get('name');
            $projectType->save();

            // redirect
            Session::flash('message', 'Successfully updated projectType!');
            return Redirect::to('projectType');
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
        $projectType = ProjectType::find($id);
        $projectType->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the projectType!');
        return Redirect::to('projectType');
	
	}


}
