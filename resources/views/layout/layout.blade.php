<!DOCTYPE html>
<html>
<head>
    <title>CRUD Assignment</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        select.form-control{
            height: 34px !important;
        }
    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm">
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				    <ul class="navbar-nav">
				      <li class="nav-item active">
				        <a class="nav-link" href="{{ URL('orders') }}">Orders</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ URL('courses') }}">Courses</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ URL('system_variables') }}">System Variables</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ URL('user_variables') }}">User Variables</a>
				      </li>
				    </ul>
				</nav>
			</div>
		</div>
		<div class="container-fluid">
	    	@yield('content')
	    </div>
	</div>
</body>
</html>