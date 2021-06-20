@extends('layout.layout')
@section('content')

    <br/>
    <div class="row">
        <div class="col-sm">
            <h3 class="float-left"> Show {{ $module_name }}</h3>
        </div>

        <div class="col-sm">
            <a class="btn btn-primary float-right" href="{{ route('user_variables.index') }}"> Back</a>
        </div>
    </div>

    <br/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Field Key:</strong>
                {{ $userVariable->field_key }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Values:</strong>
                {{ $userVariable->values }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $userVariable->comment }}
            </div>
        </div>
    </div>

@endsection