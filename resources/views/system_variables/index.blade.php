@extends('layout.layout')
@section('content')

    <br/>
    <div class="row">
        <div class="col-sm">
            <h3 class="float-left"> List Of {{ $module_name }}</h3>
        </div>

        <div class="col-sm">
            <a class="btn btn-success float-right" href="{{ route('system_variables.create') }}"> Create New {{ $module_name }}</a>
        </div>
    </div>

    @if ($message = Session::get('success'))

        <br/>
        <div class="row">
            <div class="col-sm">
                <div class="alert alert-success text-center">
                    <h1>{{ $message }}</h1>
                </div>
            </div>
        </div>

    @endif

    <br/>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Field Key</th>
                <th>Value</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($systemVariables as $systemVariable)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $systemVariable->field_key }}</td>
                    <td>{{ $systemVariable->values }}</td>
                    <td>{{ $systemVariable->detail }}</td>
                    <td>
                        <form action="{{ route('system_variables.destroy',$systemVariable->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('system_variables.show',$systemVariable->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('system_variables.edit',$systemVariable->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>
    </div>

    {!! $systemVariables->links() !!}

@endsection