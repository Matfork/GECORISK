<?php

class FrecuencyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexFrecuencyRisk($projectType_id = null)
	{
        $risk = Risk::all();

		if($projectType_id == null || $projectType_id == 0){
            $maxProjects = Project::select(DB::raw('count(*) as maxProjects'))->get()[0]['maxProjects'];

            foreach ($risk as $key => $value) {
                $value->setTotalProjectsAssociated(count($value->riskProjects));
                $frecuency = number_format( ($value->getTotalProjectsAssociated() / $maxProjects ) *100, '2', '.', '');
                $value->setFrecuency($frecuency);
            }



            $filterProject_id = 0;
        }else{
            $maxProjects = Project::select(DB::raw('count(*) as maxProjects'))->where('projectType_id','=', $projectType_id)->get()[0]['maxProjects'];
            
            foreach ($risk as $key => $value) {
                $counter = 0;

                foreach ($value->riskProjects as $key => $riskProject) {
                    if($riskProject->project->projectType_id == $projectType_id){
                        $counter++;
                    }
                }
                
                $value->setTotalProjectsAssociated($counter);

                $frecuency = number_format( ( $value->getTotalProjectsAssociated() / $maxProjects ) *100, '2', '.', '');
                $value->setFrecuency($frecuency);
            }

            $filterProject_id = $projectType_id;
        }

      
        return View::make('queries.frecuencyRisk')->with('risks', $risk)->with('filterProject_id', $filterProject_id)
                ->with('total_projects', $maxProjects);
    }

    public function indexFrecuencyProject()
	{
		 // get all the projects
        $project = Project::all();

        // load the view and pass the projects
        return View::make('queries.frecuencyProject')->with('projects', $project);
    }

    public function indexDocumentMain()
    {
         // get all the projects
        $documents = Document::all();

        // load the view and pass the projects
        return View::make('queries.documentMain')->with('documents', $documents);
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
