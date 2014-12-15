<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the projects
        $projects = Project::all();

        // load the view and pass the projects
        return View::make('projects.index')->with('projects', $projects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/projects/create.blade.php)
        return View::make('projects.create');
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
            'beginDate' => 'required',
            'endDate' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('project/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {

        	/*  strtotime funcion: 
				Dates in the m/d/y or d-m-y formats are disambiguated by looking at the separator between the various components: 
				if the separator is a slash (/), then the American m/d/y is assumed; 
				whereas if the separator is a dash (-) or a dot (.), then the European d-m-y format is assumed.
        	*/

			//Stroing as European Way  dd/mm/YYYY
			$formatBeginDate = date('Y-m-d',strtotime(str_replace('/', '-', Input::get('beginDate'))));
			$formatEndDate = date('Y-m-d',strtotime(str_replace('/', '-', Input::get('endDate'))));
 			
			//Storing as American Way  mm/dd/YYYY
			//$formatBeginDate = date('Y-m-d',strtotime(Input::get('beginDate')));
			//$formatEndDate = date('Y-m-d',strtotime(Input::get('endDate')));

            // store
            $project = new Project;
            $project->name       = Input::get('name');
            $project->description= Input::get('description');
            //$project->beginDate  = Input::get('beginDate');
            $project->setBeginDate($formatBeginDate);
            $project->setEndDate($formatEndDate);
            $project->finished 	= Input::get('chbx_finished')==NULL ? FALSE : TRUE;
            
            $project->save();
		/*	$queries = DB::getQueryLog();
			$last_query = end($queries);
			var_dump($last_query);
			die;
		*/
			// redirect
            Session::flash('message', 'Successfully created projects!');
            return Redirect::to('project');
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
		 // get the project
        $project = Project::find($id);
        // show the view and pass the project to it
        return View::make('projects.show')->with('project', $project);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // get the project
        $project = Project::find($id);

        // show the edit form and pass the project
        return View::make('projects.edit')->with('project', $project);
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
            'beginDate' => 'required',
            'endDate' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('projects/' . $id . '/edit')
                ->withErrors($validator);
        } else {

        	//Stroing as European Way  dd/mm/YYYY
			$formatBeginDate = date('Y-m-d',strtotime(str_replace('/', '-', Input::get('beginDate'))));
			$formatEndDate = date('Y-m-d',strtotime(str_replace('/', '-', Input::get('endDate'))));

            // store
            $project = Project::find($id);
            $project->name       = Input::get('name');
            $project->description= Input::get('description');
            $project->setBeginDate($formatBeginDate);
            $project->setEndDate($formatEndDate);
            $project->finished 	= Input::get('chbx_finished')==NULL ? FALSE : TRUE;
            $project->save();

            // redirect
            Session::flash('message', 'Successfully updated project!');
            return Redirect::to('project');
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
        $project = Project::find($id);
        $project->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the project!');
        return Redirect::to('project');
	}


}
