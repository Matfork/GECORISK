<?php

class ChartController extends \BaseController {


    public function indexChartProjectRisk($projectType_id = null)
	{
		 // get all the projects

         if($projectType_id == null || $projectType_id == 0)
            $project = Project::all();
         else
            $project = Project::where('projectType_id','=', $projectType_id)->get();

         $list_one = array();
         $list_drilldown = array();
         
        //echo "<pre>";
         foreach ($project as $k1 => $sp) {
            //project info
            $lor            = new stdClass;
            $lor->name      = $sp->name;
            $lor->y         = count($sp->riskProjects);
            $lor->drilldown = $sp->project_id;
            $list_one[$k1] = $lor;

            //drilldown info

            $ltr     = new stdClass;
            $ltr->id = $sp->project_id;
            $data     = array();
                
            foreach ($sp->riskProjects as $k2 => $srp) {

                /*$temp = array();
                $temp[0]  = $srp->risk->name;
                $temp[1]  = $srp->impact * $srp->probability;
                */

                $temp = new stdClass;
                $temp->name  = $srp->risk->name;
                $temp->y  =  $srp->impact * $srp->probability;
                $temp->color =  Indicator::processData($srp->impact * $srp->probability, "risk_level",TRUE);
                
                //array_push($data,$temp);
                $data[$k2] = $temp;
            }

            $ltr->data = $data; 
            $ltr->name = "Risk Level"; 
            $list_drilldown[$k1] = $ltr; 
         }

         //var_dump(json_encode($list_one));die;
        //var_dump(json_encode($list_drilldown));die;
        return View::make('charts.projectRiskChart')->with('list_one', json_encode($list_one))->with('list_drilldown', json_encode($list_drilldown))
        ->with('filterProject_id', $projectType_id);
    }

    public function indexChartRiskMatrix()
    {
         // get all the projects
        $documents = Document::all();

        // load the view and pass the projects
        return View::make('charts.riskMatrixChart')->with('documents', $documents);
    }

    //Ajax by POST Request
    public function searchAssociations() {
        
        $data = Input::all();
        $response = array();

        if($data['type'] == 'risk'){

            if($data['project_type_id']==0)
                $projects = RiskProject::join('projects', 'risks_projects.project_id', '=', 'projects.project_id')
                ->where('risks_projects.risk_id', '=', $data['id'])
                ->get();    
            else
                $projects = RiskProject::join('projects', 'risks_projects.project_id', '=', 'projects.project_id')
                ->where('risks_projects.risk_id', '=', $data['id'])
                ->where('projects.projectType_id', '=', $data['project_type_id'])
                ->get();    
        	
        	$dataFromTemplate = View::make('includes.templateFrecuency')->with('projects', $projects)
        						->with('risks', null)->renderSections()['frecuencyProject'];

			$response['numberRows'] = $projects->count(); 
       
        }else{
            $risks = RiskProject::join('risks', 'risks_projects.risk_id', '=', 'risks.risk_id')
                ->where('risks_projects.project_id', '=', $data['id'])->get();  

        	$dataFromTemplate = View::make('includes.templateFrecuency')->with('risks', $risks)
        	->with('projects', [])->renderSections()['frecuencyRisk'];

        	$response['numberRows'] = $risks->count(); 
        }

        $response['status'] = 'success';
        $response['data'] = $dataFromTemplate;
       
        return Response::json( $response );
    }
}
