@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.solutions.header', array('param' => '2'))

        <h1>Edit {{ $solution->name }}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
            
            {{ Form::model($solution, array('method' => 'put', 'route' => array('solution.update', $solution->solution_id )) ) }}

                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textArea('description', Input::old('descriṕtion'), array('class' => 'form-control', 'rows' => '5')) }}
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Edit', array('class' => 'btn btn-success btn-block')) }}
                   </div>
                    <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('solution') }}">Cancel</a>
                    </div>
                </div>
               
            {{ Form::close() }}
        
        </div>
    </div>
@stop