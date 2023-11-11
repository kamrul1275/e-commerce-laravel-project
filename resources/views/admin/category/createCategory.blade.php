@extends('admin.layout.master')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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

						

   <form id="myForm" method="post" action="{{ route('store.category')}}"  enctype="multipart/form-data">
	@csrf

                           <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="category_name"  />
                                </div>
                            </div>

		                    <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category Photo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="category_image" id="image" class="form-control" />
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                   
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <img id="showImage" src="{{  url('upload/no_image.jpg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" style="width: 100px; height: 100px;">
                                </div>
                            </div>

   

	<button class="btn btn-primary py-2">Save</button>
</form>


</div>
</div>





<!-- upload image show -->


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


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