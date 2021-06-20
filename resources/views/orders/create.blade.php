@extends('layout.layout')
@section('content')

    <br/>
    <div class="row">
        <div class="col-sm">
            <h3 class="float-left"> Add New {{ $module_name }}</h3>
        </div>

        <div class="col-sm">
            <a class="btn btn-primary float-right" href="{{ route('orders.index') }}"> Back</a>
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

    <form action="{{ route('orders.store') }}" method="POST">
         @csrf
         <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Name:</strong>
                        <select name="course_id" class="form-control">
                            <option value="" selected>Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name}}</option>
                            @endforeach
                        </select>
                </div>
            </div>

            <div class="col-sm-12">
                <table class="table table-hover small-text" id="tb">
                    <tr class="tr-header">
                        <th>Order</th>
                        <th>Question</th>
                        <th>Option A</th>
                        <th>Option B</th>
                        <th>Option C</th>
                        <th>Option D</th>
                        <th>Option E</th>
                        <th>Option F</th>
                        <th>Correct Option</th>
                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" class="btn btn-primary" title="Add Course Order">Add</a></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="order[]" class="form-control" required></td>
                        <td><input type="text" name="question[]" class="form-control" required></td>
                        <td><input type="text" name="option_a[]" class="form-control" required></td>
                        <td><input type="text" name="option_b[]" class="form-control" required></td>
                        <td><input type="text" name="option_c[]" class="form-control" required></td>
                        <td><input type="text" name="option_d[]" class="form-control" required></td>
                        <td><input type="text" name="option_e[]" class="form-control" required></td>
                        <td><input type="text" name="option_f[]" class="form-control" required></td>
                        <td>
                            <select name="option_id[]" class="form-control" required>
                                <option value="" selected>Select Option</option>
                                @foreach($options as $option)
                                    <option value="{{ $option->id }}">{{ $option->values}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><a href='javascript:void(0);' class='remove btn btn-danger'>Remove</a></td>
                    </tr>
                </table>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Name:</strong>
                        <select name="status_id" class="form-control">
                            <option value="" selected>Select Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->values}}</option>
                                @endforeach
                        </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <script>
    $(function(){
        $('#addMore').on('click', function() {
                  var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                  data.find("input").val('');
         });

         $(document).on('click', '.remove', function() {
             var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                 $(this).closest("tr").remove();
               } else {
                 alert("Sorry!! Can't remove first row!");
               }
          });
    });      
    </script>


@endsection