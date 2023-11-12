@extends('admin.layout.master')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">

					  <form id="myForm" method="post" action="{{ route('store.product')}}" enctype="multipart/form-data" >
                         @csrf
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">

						   <div class="mb-3">
								<label for="inputProductTitle" class="form-label">Product Name</label>
								<input type="text" class="form-control" name="product_name" id="inputProductTitle" placeholder="Enter product name">
							  </div>

								<div class="mb-3">
									<label class="form-label">Product_tags</label>
									<input type="text" class="form-control visually-hidden" data-role="tagsinput" name="product_tags" value="New Product,Product Part">
								</div>

								<div class="mb-3">
									<label class="form-label">Product_size</label>
									<input type="text" class="form-control visually-hidden" data-role="tagsinput" name="product_size" value="small,medium,large">
								</div>



								<div class="mb-3">
									<label class="form-label">Product_color</label>
									<input type="text" class="form-control visually-hidden" data-role="tagsinput" name="product_color" value="red,grren,blue">
								</div>


							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Short Description</label>
								<textarea class="form-control" name="short_descp" id="inputProductDescription" rows="3"></textarea>
							   </div>

							
							   <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Long Description</label>
								<textarea id="mytextarea" name="long_descp">Hello, World!</textarea>
							  </div>
				


							    <div class="mb-3">
									<label for="formFile" class="form-label">Main Thambnail</label>
									<input class="form-control" name="product_thambnail" type="file" id="formFile">
								</div>

								<div class="mb-3">
									<label for="formFileMultiple" class="form-label"> Multiple image</label>
									<input class="form-control" name="multi_img[]" type="file" id="formFileMultiple" multiple="">
								</div> 


                            </div>
						   </div>



						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="col-md-6">
									<label for="inputPrice" class="form-label">selling_price</label>
									<input type="text" class="form-control" name="selling_price" id="inputPrice" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="inputCompareatprice" class="form-label">discount_price</label>
									<input type="text" class="form-control" name="discount_price" id="inputCompareatprice" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="inputCostPerPrice" class="form-label">product_qty</label>
									<input type="text" class="form-control" name="product_qty" id="inputCostPerPrice" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="inputStarPoints" class="form-label">product_code</label>
									<input type="text" class="form-control" name="product_code" id="inputStarPoints" placeholder="00.00">
								  </div>
								  <div class="col-12">
									<label for="inputProductType"  class="form-label">Brand</label>
                                  

									<select class="form-select" name="brand_id" id="inputProductType">
										
										
									@foreach($brands as $brand)
									<option value="{{$brand->id }}">{{$brand->brand_name}}</option>
									@endforeach
									  </select>

								  </div>
								  <div class="col-12">
									<label for="inputVendor" class="form-label">Category</label>
									<select class="form-select" name="category_id" id="inputVendor">

									   @foreach($categories as $category)
								
										<option value="{{$category->id}}">{{$category->category_name}}</option>
										@endforeach
									  </select>
								  </div>

								  <div class="col-12">
									<label for="inputCollection" class="form-label">SubCategory</label>
									<select class="form-select" name="subcategory_id" id="inputCollection">
										<option></option>
										
									  </select>
								  </div>

								  <div class="col-12">
									<label for="inputProductTags" class="form-label">Product Tags</label>
									<input type="text" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
								  </div>
								 





								  <div class="col-12">
									<div class="d-grid">
									   
										<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
			  
									</div>
								</div>







							  </div> 
						  </div><!--end  4 row-->




						  </div>
					   </div><!--end row-->


					</div>


				  </form>


			  </div>

			</div>








	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>


	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
	




<!-- single  image show -->


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

<!-- multi images -->
<script> 
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
  <!-- end of multi images -->



  <!-- subcategory load -->

  
  <script type="text/javascript">
  		
  		$(document).ready(function(){
  			$('select[name="category_id"]').on('change', function(){
  				var category_id = $(this).val();
  				if (category_id) {
  					$.ajax({
  						url: "{{ url('/subcategory/ajax') }}/"+category_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="subcategory_id"]').html('');
  							var d =$('select[name="subcategory_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  </script>
  <!--end  subcategory load -->


<!-- validation -->

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                }, 
                 short_descp: {
                    required : true,
                }, 
                 product_thambnail: {
                    required : true,
                }, 
				multi_img: {
                    required : true,
                }, 
                 selling_price: {
                    required : true,  
                },  
				discount_price: {
                    required : true, 
                },                 
                 product_code: {
                    required : true,
                }, 
                 product_qty: {
                    required : true,
                }, 
                 brand_id: {
                    required : true,
                }, 
                 category_id: {
                    required : true,
                }, 
                 subcategory_id: {
                    required : true,
                }, 
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                },
                short_descp: {
                    required : 'Please Enter Short Description',
                },
                product_thambnail: {
                    required : 'Please Select Product Thambnail Image',
                },
                multi_img: {
                    required : 'Please Select Product Multi Image',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                }, 

				discount_price: {
                    required : 'Please Enter Discount Price',
                }, 
                product_code: {
                    required : 'Please Enter Product Code',
                },
                 product_qty: {
                    required : 'Please Enter Product Quantity',
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