@extends('layouts.adminlayout')

@section('content')
<div>

    
	<form enctype="multipart/form-data" action="{{ url('/addMovies') }}" method="POST">
        @csrf

		<div class="row form-group">

			<h1 class="col-sm-12"><i class="fas fa-university"></i> Student Entry Form</h1>

		</div>

    <!-- ----------------------------------- PERSONAL INFORMATION ----------------------------------- -->


		<div class="row form-group">

			<h4 class="col-sm-12">Personal Information</h4>

		</div>


		<div class="row form-group">

			<label class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" id="name" class="form-control" name="movie_name" placeholder="Faiq"><br>
			</div>

		</div>


		<div class="row form-group">
			
			<label class="col-sm-2 col-form-label">Father Name</label>				
			<div class="col-sm-10">
				<input type="text" id="f_name" class="form-control" name="movie_description" placeholder="Shahzad"><br>
			</div>

		</div>


		<div class="row form-group">

			<label class="col-sm-2 col-form-label">Age</label>
			<div class="col-sm-2">
				<input type="number" id="age" class="form-control" name="ratings" placeholder="20"><br>
			</div>

		</div>


		<div class="row form-group">

			<label class="col-sm-2 col-form-label">Email Address</label>
			<div class="col-sm-3">
				<input type="number" id="mail" class="form-control" name="year" placeholder="faiq@something.com"><br>
			</div>

		</div>
		
		


		<div class="row form-group">
			
			<label class="col-sm-2 col-form-label" for="img">Your Picture</label>
			<div class="col-sm-3">
				<input type="file" id="img" class="form-control" name="movie_cover"><br>
			</div>

		</div>


		<hr>




		<div class="row form-group">
		</div>

		<button type="submit" class="btn btn-primary col-sm-2 offset-sm-5">Submit</button>


	</form>

	<br>
</div>
    
@endsection