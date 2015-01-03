@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.documents.header', array('param' => '1'))
           
        <h1>Create a document</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
          
            {{ Form::open(array('url' => 'document','files' => true)) }}

                <div class="form-group">
                    {{ Form::label('solution_id', 'Solution') }}
                    {{ Form::text('solution_id', Input::old('name'), array('class' => 'form-control')) }}
                </div>

                 <div class="form-group">
                    {{ Form::label('documentType_id', 'Document Type') }}
                    {{ Form::select('documentType_id', DocumentType::lists('name','documentType_id'), Input::old('documentType_id'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('documentToUpload', 'File') }}
                    {{ Form::file('documentToUpload', Input::old('documentToUpload'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textArea('description', Input::old('description'), array('class' => 'form-control','rows' => 5)) }}
                </div>

               
                <!--
                    <div class="form-group">
                        {{ Form::label('pathFile', 'Path File') }}
                        {{ Form::text('pathFile', Input::old('name'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nameFile', 'Name File') }}
                        {{ Form::text('nameFile', Input::old('name'), array('class' => 'form-control')) }}
                    </div>
                -->
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Add', array('class' => 'btn btn-success btn-block')) }}
                    </div>
                    <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('document') }}">Cancel</a>
                    </div>
                </div>
               
            {{ Form::close() }}

        </div>

    </div>
@stop