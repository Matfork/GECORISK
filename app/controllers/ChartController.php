<?php

class ChartController extends \BaseController {


    public function indexChartProjectRisk()
	{
		 // get all the projects
         $project = Project::all();

        // load the view and pass the projects
        return View::make('charts.projectRiskChart')->with('projects', $project);
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
