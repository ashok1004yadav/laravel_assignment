@extends('layout.layout')
@section('content')

    <br/>
    <div class="row">
        <div class="col-sm">
            <h3 class="float-left"> Add New {{ $module_name }}</h3>
        </div>

        <div class="col-sm">
            <a class="btn btn-primary float-right" href="{{ route('courses.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <br/>
        <div class="row">
            <div class="col-sm">
                    <div class="alert alert-danger text-center">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
         @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection