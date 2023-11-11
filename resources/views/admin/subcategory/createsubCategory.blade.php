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

     <form id="myForm" method="post"  action="{{ route('store.subcategory')}}">
	   @csrf

		<div class="mb-3">
		<label class="form-label">Name:</label>
		<input type="name" name="subcategory_name" class="form-control" placeholder="name">
		</div>

               <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category_id">
									
				@foreach ($categories as $category_id)

				<option value="{{ $category_id->id }}">{{$category_id->category_name}}</option>

				@endforeach
				
			   </select>

       
          <input type="submit" class="btn btn-primary">
	   

      </form>


</div>
</div>






<!-- validation -->


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                }, 
                category_image: {
                    required : true,
                }, 
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
                },

                category_image: {
                    required : 'Please Enter Category Image',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>





 
@endsection