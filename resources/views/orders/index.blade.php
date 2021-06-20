@extends('layout.layout')
@section('content')

    <br/>
    <div class="row">
        <div class="col-sm">
            <h3 class="float-left"> List Of {{ $module_name }}</h3>
        </div>

        <div class="col-sm">
            <a class="btn btn-success float-right" href="{{ route('orders.create') }}"> Create New {{ $module_name }}</a>
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
                <th>Course</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            
            @php ($course_ids = [])

            @foreach ($orders as $order)
                @if (!in_array($order->course_id, $course_ids))
                    @php ($course_ids[] = $order->course_id)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->course_id }}</td>
                        <td>{{ $order->status_id }}</td>
                        <td>
                            <form action="{{ route('orders.destroy',$order->course_id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('orders.edit',$order->course_id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif

            @endforeach
        </table>
    </div>

    {!! $orders->links() !!}

@endsection