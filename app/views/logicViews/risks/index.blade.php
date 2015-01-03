@extends('layouts.default')

@section('content')
   
    <div class="container">

         @include('includes.logicViews.risks.header', array('param' => '2'))

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h1>Risk Module</h1>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Risk Type</td>
                        <!-- <td>Projects_related</td> 
                        <td>RiskProject</td> -->
                        <td colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($risks as $key => $value)
                    <tr>
                        <td style="width:5%;">{{ $value->risk_id }}</td>
                        <td style="width:20%;">{{ $value->name }}</td>
                        <td style="width:35%;">{{ $value->description }}</td>
                        <td style="width:20%;">{{ $value->riskType->name }}</td>
                        <!--
                        <td>
                            <?php
                            /*  using normal modal for pivot
                                foreach($value->risk_projects  as $p1){
                                print '<br>' . $p1->project;
                            }*/?>
            
                            <?php
                            /*  using pivot modal
                                foreach($value->projects  as $p1){
                                print '<br>' . $p1->name . ' ' . $p1->pivot->impact;
                            }*/?>
                        </td>
                        -->
                        <td style="width:10%;">
                            <!-- show the nerd (uses the show method found at GET /risks/{id} -->
                            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('risk/' . $value->risk_id) }}">Show this Risk</a>-->
            
                            <!-- edit this nerd (uses the edit method found at GET /risks/{id}/edit -->
                            <a class="btn btn-small btn-warning" href="{{ URL::to('risk/' . $value->risk_id . '/edit') }}">Edit</a>
                        </td>
                        <td style="width:10%;">
                            <!-- delete the nerd (uses the destroy method DESTROY /risks/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                             {{ Form::open(array('url' => 'risk/' . $value->risk_id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                         <td style="width:10%;">
                            @if(count($value->riskProjects)>0)
                                <a class="btn btn-small btn-info2" href="{{ URL::to('riskProject/risk/'.$value->risk_id) }}">{{count($value->riskProjects)}} Linked Projects</a>
                            @else
                                <span class="btn btn-small btn-info2" >No linked Projects Yet</span>
                            @endif
                        </td>
                         <td style="width:10%;">
                               <a class="btn btn-small btn-primary" href="{{ URL::to('riskProject/create/risk/'.$value->risk_id) }}">+ Link</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop