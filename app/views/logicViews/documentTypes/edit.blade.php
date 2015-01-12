@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.documentTypes.header', array('param' => '2')) 

        <h1>Edit {{ $documentType->name }}</h1>
        
         <div class="description_module">
            <h5>Update the following fields to change the current document type information:<h5>
        </div>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
            
            {{ Form::model($documentType, array('method' => 'put', 'route' => array('documentType.update', $documentType->documentType_id )) ) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Edit', array('class' => 'btn btn-block btn-success')) }}
                    </div>
                     <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('documentType') }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}

        </div>
    </div>
    
@stop