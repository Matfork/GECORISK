@extends('layouts.default')

@section('content')

    <script>
        $(function(){
            var risksByProject = new Array();

            @if(isset($risksByProject)) 
                risksByProject = {{$risksByProject}};        
            @endif

            ChartJS.initialChartRiskMatrixSetUp(risksByProject);
        });
    </script> 

    <div class="container">

        @include('includes.logicViews.charts.header', array('param' => '1')) 

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        
       <div style="height:85px;">
            <div style="float:left"><h1>Risk Matrix by Project</h1></div>
            <div class="inputFilers">
                <div class="col-md-4 form-group"  style="float:right;">
                    {{ Form::label('filter_project', 'Filter by Project') }}
                    {{ Form::select('filter_project', array('0' => '----- Choose a Project -----') + Project::lists('name','project_id'), isset($project[0])?$project[0]->project_id:0 , array('class' => 'form-control filters')) }}
                </div>           
            </div>
        </div>

        <div class="description_text">
            <p>
                Here you can visualize a risk matrix by selecting a project as a filter, inside the matrix all the risks are displayed according to risk level
                calculated by the formula: Probabilty x Impact. 
            </p>
            <p>
                Remember the application is based from 1 to 5 levels for impact and probability cases.
            </p>
        </div>
        
        @if(isset($project[0]))
            <div class="jumbotron notFoundMatrix">
                <h1>Whoops!</h1>
                <p>There are no Risks associated to the project named: {{$project[0]->name}}  </p>     
            </div>
        @endif

        <div class="table-responsive riskMatrix">
           <table class="table table-bordered tableRiskMatrix">
                <tbody>     
                    <tr class="customTrRisk" data-impact="5">
                        <th class="col-md-1" rowspan="5" style="vertical-align:middle;"><div class="vertical-text">IMPACT</div></th>
                        <th class="col-md-1">5</th>
                        <td class="col-md-2 success" data-prob="1">
                            <div class="riskInfo">
                                <div class="value_risk">5</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>                                
                            </div>
                        </td>
                        <td class="col-md-2 warning" data-prob="2">
                            <div class="riskInfo">
                                <div class="value_risk">10</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="col-md-2 warning" data-prob="3">
                            <div class="riskInfo">
                                <div class="value_risk">15</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="col-md-2 danger" data-prob="4">
                            <div class="riskInfo">
                                <div class="value_risk">20</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="col-md-2 danger" data-prob="5">
                            <div class="riskInfo">
                                <div class="value_risk">25</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>           
                    </tr>
                           
                    <tr class="customTrRisk" data-impact="4">
                        <th>4</th>
                        <td class="success" data-prob="1">
                            <div class="riskInfo">
                                <div class="value_risk">4</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="2">
                            <div class="riskInfo">
                                <div class="value_risk">8</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="warning" data-prob="3">
                            <div class="riskInfo">
                                <div class="value_risk">12</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="warning" data-prob="4">
                            <div class="riskInfo">
                                <div class="value_risk">16</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="danger" data-prob="5">
                            <div class="riskInfo">
                                <div class="value_risk">20</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>           
                    </tr>

                    <tr class="customTrRisk" data-impact="3">
                        <th>3</th>
                        <td class="success" data-prob="1">
                            <div class="riskInfo">
                                <div class="value_risk">3</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="2">
                            <div class="riskInfo">
                                <div class="value_risk">6</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="3">
                            <div class="riskInfo">
                                <div class="value_risk">9</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="warning" data-prob="4">
                            <div class="riskInfo">
                                <div class="value_risk">12</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="warning" data-prob="5">
                            <div class="riskInfo">
                                <div class="value_risk">15</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>               
                    </tr>
                    <tr class="customTrRisk" data-impact="2">
                        <th>2</th>
                        <td class="success" data-prob="1">
                            <div class="riskInfo">
                                <div class="value_risk">2</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="2">
                            <div class="riskInfo">
                                <div class="value_risk">4</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="3">
                            <div class="riskInfo">
                                <div class="value_risk">6</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="4">
                            <div class="riskInfo">
                                <div class="value_risk">8</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="warning" data-prob="5">
                            <div class="riskInfo">
                                <div class="value_risk">10</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>                         
                    </tr>
                    <tr class="customTrRisk" data-impact="1">
                        <th>1</th>
                        <td class="success" data-prob="1">
                            <div class="riskInfo">
                                <div class="value_risk">1</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="2">
                            <div class="riskInfo">
                                <div class="value_risk">2</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="3">
                            <div class="riskInfo">
                                <div class="value_risk">3</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="4">
                            <div class="riskInfo">
                                <div class="value_risk">4</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>
                        <td class="success" data-prob="5">
                            <div class="riskInfo">
                                <div class="value_risk">5</div>
                                <div class="td_outer_text"><div class="td_inner_text"><ol></ol></div></div>
                                <div class="more_info_text"></div>
                            </div>
                        </td>         
                    </tr>
                    <tr class="customTrRisk_bottom">
                        <th colspan="2" rowspan="2"></th>
                        <th class="th_align">1</th>
                        <th class="th_align">2</th>
                        <th class="th_align">3</th>
                        <th class="th_align">4</th>
                        <th class="th_align">5</th>           
                    </tr>
                     <tr class="customTrRisk_bottom">
                        <th colspan="6"><div class="horizonal-text">PROBABILITY</div></th>           
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

@stop