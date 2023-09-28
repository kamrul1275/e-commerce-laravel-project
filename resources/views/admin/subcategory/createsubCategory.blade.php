@extends('admin.layout.master')

@section('admin_content')

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

<h6 class="mb-0 text-uppercase py-3">Create SubCategory</h6>
<div class="row">
					<div class="col-xl-8 mx-auto">
					
						<hr/>

   <form method="post"  action="{{ route('store.subcategory')}}">
	@csrf
		<div class="mb-3">
		<label class="form-label">Name:</label>
		<input type="name" name="name" class="form-control" placeholder="name">
		</div>

        <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category_id">
									
									@foreach ($categories as $category_id)
									<option value="1">{{$category_id->name}}</option>
									@endforeach
									
									
								</select>

        <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>
       <input type="submit" class="btn btn-primary">
	   

   </form>


</div>
</div>

 
@endsection