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
        $riskProjects = RiskProject::paginate(20);
        
       // echo "<pre>";
       // var_dump($riskProjects);  die;

        // load the view and pass the riskProjects
        return View::make('logicViews.risksProjects.index')->with('riskProjects', $riskProjects);
	}


    public function indexFilter($type,$id)
    {
        
       if($type == "risk"){
            $riskProjects = RiskProject::where('risk_id', '=', $id)->paginate(20);     
            return View::make('logicViews.risksProjects.index')
            ->with('riskProjects', $riskProjects)
            ->with('filterRisk', $id);
        }
       else
       {
            $riskProjects = RiskProject::where('project_id', '=', $id)->paginate(20);
            return View::make('logicViews.risksProjects.index')
            ->with('riskProjects', $riskProjects)
            ->with('filterProject', $id);
       }


    }

    //Ajax by POST Request
    public function filterFormByAjax() {
        
        $data = Input::all();
        
        if(!empty($data['valSearch'])){
            $filter = ($data['valSearch']=="all") ? "" : $data['valSearch'];
           /* $riskProjects = DB::table('risks_projects')
                ->join('risks', 'risks.risk_id', '=', 'risks_projects.risk_id')
                ->join('projects', 'projects.project_id', '=', 'risks_projects.project_id')
                ->where('risks.name', 'like', '%'.$data['valSearch'].'%')
                ->orWhere('projects.name', 'like', '%'.$data['valSearch'].'%')
                ->get();*/

            $riskProjects = RiskProject::join('risks', 'risks.risk_id', '=', 'risks_projects.risk_id')
                ->join('projects', 'projects.project_id', '=', 'risks_projects.project_id')
                ->where('risks.name', 'like', '%'.$filter.'%')
                ->orWhere('projects.name', 'like', '%'.$filter.'%')
                ->get();

        }else{
            if($data['valRisk'] == '0' && $data['valProject'] == '0') 
                $riskProjects = RiskProject::all();
            else if($data['valRisk'] == '0' && $data['valProject'] != '0') 
                $riskProjects = RiskProject::where('project_id', '=', $data['valProject'])->get();
            else if($data['valProject'] == '0' && $data['valRisk'] != '0') 
                $riskProjects = RiskProject::where('risk_id', '=', $data['valRisk'])->get();
            else
                $riskProjects = RiskProject::where('risk_id', '=', $data['valRisk'])
                ->where('project_id', '=', $data['valProject'])->get();

            }

        /*$queries = DB::getQueryLog();
        var_dump($queries); */

        $response = array();
        $response['status'] = 'success';
        $response['numberRows'] = $riskProjects->count(); 
       
        /*var_dump($riskProjects);
        die;*/
        /* DATA RESPONSE */

        /*1.- We can use blades templates if we want to send all the html with data already formatted just to print it on a div*/
        $dataFromTemplate = View::make('includes.templateRiskProject')->with('riskProjects', $riskProjects)->renderSections()['riskProkectTemplate'];
        $response['data'] = $dataFromTemplate;

        //2.- Or we can just return the data and we manipulate it the way we like it, I'm using handlebars which is very similar to blade
        //$response['data'] = $riskProjects;
       
        return Response::json( $response );
    }


    //Ajax by GET Request
  /*   public function filterFormByAjaxGet($data) {
        
        $obj = json_decode($data,false);
        $risks = RiskProject::where('risk_id', '=', $obj->val)->get();

        //$queries = DB::getQueryLog();
        //var_dump($queries);

        $response = array(
            'status' => 'success',
            'data' => $risks, 
        );

        return Response::json( $response );
    }
    */

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/riskProjects/create.blade.php)
        return View::make('logicViews.risksProjects.create');
	}

    public function createFilter($type,$id)
    {
        if($type == "risk"){
            return View::make('logicViews.risksProjects.create')
            ->with('filterRisk', $id);
        }
       else
       {
            return View::make('logicViews.risksProjects.create')
            ->with('filterProject', $id);
       }
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
            if(Input::get('type')=='risk')
                return Redirect::to('riskProject/create/'.Input::get('type').'/'.Input::get('risk_id'))->withErrors($validator)->withInput(Input::except('name'));
            else if(Input::get('type')=='project')
                return Redirect::to('riskProject/create/'.Input::get('type').'/'.Input::get('project_id'))->withErrors($validator)->withInput(Input::except('name'));
            else
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
        return View::make('logicViews.risksProjects.show')->with('riskProject', $riskProject);
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
       
        return View::make('logicViews.risksProjects.edit')->with('riskProject', $riskProject);
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
            return Redirect::to('logicViews.risksProjects./' . $id . '/edit')
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