@extends('admin.layout.master')

@section('admin_content')



		<h6 class="mb-0 text-uppercase py-3">Create Category</h6>
		<div class="row">


{{-- Validation start --}}


				@if ($errors->any())
				  <div class="alert alert-danger">
					 <ul>

						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
				   </ul>
			    </div>
		       @endif

		@if (Session::has('msg'))
		<h4 class="text-success">{{Session::get('msg')}} </h4>
		@endif


		{{-- Validation end --}}

<div class="col-xl-8 mx-auto">
	<h6 class="mb-0 text-uppercase py-3">Create Category</h6>
	<hr/>

						

   <form method="post" action="{{ route('store.category')}}" >
	@csrf
		<div class="mb-3">
		<label class="form-label">Name:</label>
		<input type="name" name="name" class="form-control" placeholder="name">
		</div>
    <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>

	<button class="btn btn-primary py-2">Save</button>
</form>


</div>
</div>

 
@endsection