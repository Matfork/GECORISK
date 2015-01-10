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

    public function indexChartRiskMatrix($project_id = null)
    {
        $project = Project::where('project_id','=', $project_id)->get();
        $riskProjects =  RiskProject::where('project_id','=', $project_id)->get();
        $risk_list = array();
    
        foreach ($riskProjects as $key => $value) {
            $risk               = new stdClass;
            $risk->name         = $value->risk->name;
            $risk->impact       = $value->impact;
            $risk->probability  = $value->probability;
            $risk->risk_level   = $value->probability * $value->impact;
            $risk_list[$key] = $risk;
        }
       
        return View::make('charts.riskMatrixChart')->with('risksByProject', json_encode($risk_list))->with('project', $project);
    }
}
