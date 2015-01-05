@extends('layouts.default')

@section('content')

<div class="container">

    @include('includes.logicViews.projectTypes.header', array('param' => '1')) 

    <h1>Editing {{ $projectType->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

     <div class="form_mid">

        {{ Form::model($projectType, array('method' => 'put', 'route' => array('projectType.update', $projectType->projectType_id )) ) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::submit('Edit', array('class' => 'btn btn-block btn-success')) }}
                </div>
                 <div class="col-md-6 form-group">
                    <a class="btn btn-block btn-danger" href="{{ URL::to('projectType') }}">Cancel</a>
                </div>
            </div>
        {{ Form::close() }}

    </div>
</div>

@stop