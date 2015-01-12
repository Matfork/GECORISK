@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.documentTypes.header', array('param' => '1')) 

        <h1>Creating Document Type</h1>

        <div class="description_module">
            <h5>Complete the following information to create a document type:<h5>
        </div>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
           
           {{ Form::open(array('url' => 'documentType')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>

               <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Create', array('class' => 'btn btn-block btn-success')) }}
                    </div>
                     <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('documentType') }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}

        </div>

    </div>

@stop