@extends('layouts.master')

<!-- <script src="{{ asset('js/jquery.js') }}"></script> -->

@section('content')

	<div class="container">
		<div class="col-md-11">
            <h4 class="text-center mt-5">Create a student</h4>
			<form action="{{ route('student.store') }}" method="post" 
            enctype="multipart/form-data">

				
				{{ csrf_field() }}

                <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" 
                    class="form-control" id="name" name="name">
				</div>

                <div class="form-group">
				    <label for="father_name">Father Name</label>
				    <input type="text" 
                    class="form-control" id="father_name" name="father_name">
				</div>

                <div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" 
                    class="form-control" id="address" name="address">
				</div>

                <div class="form-group">
				    <label for="address">Phone No</label>
				    <input type="text" 
                    class="form-control" id="phone_no" name="phone_no">
				</div>
				
				<div class="form-group">
					<select name="grade" class="form-control">
						<option value="">choose grade</option>
					  	@foreach($grades as $key => $value)
					  		<option value="{{ $key }}">{{ $value }}</option>
					  	@endforeach
					</select>
				</div>

                <div class="form-group">
					<select name="class_name" class="form-control">
						<option value="">choose class</option>
					  	@foreach($classes as $key => $value)
					  		<option value="{{ $key }}">{{ $value }}</option>
					  	@endforeach
					</select>
				</div>
				
			  <button type="submit" class="btn btn-success">Store</button>

			</form>

		</div>
	</div>
	
@endsection

