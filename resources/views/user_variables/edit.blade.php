@extends('layout.layout')
@section('content')

    <br/>
    <div class="row">
        <div class="col-sm">
            <h3 class="float-left"> Edit {{ $module_name }}</h3>
        </div>

        <div class="col-sm">
            <a class="btn btn-primary float-right" href="{{ route('user_variables.index') }}"> Back</a>
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

    <form action="{{ route('user_variables.update',$userVariable->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Field Key:</strong>
                    <input type="text" name="field_key" value="{{ $userVariable->field_key }}" class="form-control" placeholder="Field Key">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Value:</strong>
                    <input type="text" name="values" value="{{ $userVariable->values }}" class="form-control" placeholder="Value">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comment:</strong>
                    <textarea class="form-control" style="height:150px" name="comment" placeholder="Comment">{{ $userVariable->comment }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection