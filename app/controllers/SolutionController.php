<?php

class SolutionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the solutions
        $solutions = Solution::all();

        // load the view and pass the solutions
        return View::make('logicViews.solutions.index')->with('solutions', $solutions);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('logicViews.solutions.create');
	}


	public function indexFilter($risk_project_id)
	{
		$solutions = Solution::where('risk_project_id', '=', $risk_project_id)->get();
		return View::make('logicViews.solutions.index')->with('solutions', $solutions);
	}

	public function createFilter($risk_project_id)
	{
		return View::make('logicViews.solutions.create')
            ->with('filterRiskProject', $risk_project_id);
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
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('solution/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {
            // store
            $solution = new Solution;
            $solution->description      = Input::get('description');
            $solution->risk_project_id   = Input::get('risk_project_id');
            $solution->save();

            // redirect
            Session::flash('message', 'Successfully created solutions!');
            return Redirect::to('solution/index/'.$solution->risk_project_id);
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
		 // get the solution
        $solution = Solution::find($id);
        // show the view and pass the solution to it
        return View::make('logicViews.solutions.show')->with('solution', $solution);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // get the solution
        $solution = Solution::find($id);

        // show the edit form and pass the solution		
       
        return View::make('logicViews.solutions.edit')->with('solution', $solution)
        ->with('filterRiskProject',$solution->risk_project_id);
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
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('solutions/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $solution 		  = Solution::find($id);
          	$solution->description= Input::get('description');
			$solution->risk_project_id= Input::get('risk_project_id');
            $solution->save();

            // redirect
            Session::flash('message', 'Successfully updated solution!');
          	return Redirect::to('solution/index/'.$solution->risk_project_id);
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
		$solution = Solution::find($id);
        $solution->delete();
        $cont = Solution::where('risk_project_id', '=', $solution->risk_project_id)->get();
      	
      	if(count($cont)>0){
      		Session::flash('message', 'Successfully deleted the solution!');
        	return Redirect::to('solution/index/'.$solution->risk_project_id);
        }else{
      		Session::flash('message', 'Successfully deleted solutions, no more solutions are left for: </br> Risk: '.$solution->risksProjects->risk->name.
      			'</br> Project: '.$solution->risksProjects->project->name);
      		return Redirect::to('riskProject');
        }
        
        
	}

}