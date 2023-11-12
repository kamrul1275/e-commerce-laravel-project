@extends('admin.layout.master')

@section('admin_content')

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>

				


					<div class="ms-auto">

                    <a class="btn-btn-primary" href="">Create Product</a>
					
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
			
				<h6 class="mb-0 text-uppercase">DataTable Import</h6>
				<hr>
			{{-- succes msg --}}

			@if (Session::has('msg'))
			<h4 class="text-success">{{Session::get('msg')}} </h4>
			@endif

		
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>

									<tr>
										<th>ID</th>
										<th>Product_Name</th>
										<th>tags</th>
										<th>Size</th>
										<th>Color</th>
										<th>short_descp</th>
										<th>Selling_Price</th>
										<th>Dis_Price</th>
										<th>Image</th>
										<th>Category</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									
								</thead>
								<tbody>
			


									@foreach ($products as $product)
									<tr>
										<td>ID</td>
										<td>{{$product->product_name}}</td>
										<td>{{$product->product_tags}}</td>
										<td>{{$product->product_size}}</td>
										<td>{{$product->product_color}}</td>
										<td>{{$product->short_descp}}</td>
										<td>{{$product->selling_price}}</td>
										<td>{{$product->discount_price}}</td>
									
										<td><img src="{{asset($product->product_thambnail)}}" style="width: 60; height:40px;" alt=""></td>

										<td>{{$product->brand_id}}</td>
										<td> 
											 @if ($product->status== 1)
											 <span class="badge round-pill bg-success">Active</span>
										    @else
										
											<span class="badge round-pill bg-danger">Inactive</span>
											@endif
										</td>
										<td>

		
											<a href="" class="btn btn-success"><i class="las la-edit"></i></a>
											<a href="" class="btn btn-primary"><i class="las la-eye"></i></a>
											<a href="" id="delete" class="btn btn-danger"><i class="las la-trash"></i></a>

											@if ($product->status== 1)
											<a href="{{url('/product/inactive/'.$product->id)}}"  class="btn btn-info" title="inactive"> <i class="las la-thumbs-down"></i></a>	
											
                                           @else
											<a href="{{url('/product/inactive/'.$product->id)}}"  class="btn btn-info" title="active"> <i class="las la-thumbs-up"></i></a>



											@endif
										</td>
									</tr>
									@endforeach

								
						
								
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Product_Name</th>
										<th>tags</th>
										<th>Size</th>
										<th>Color</th>
										<th>short_descp</th>
										<th>Selling_Price</th>
										<th>Dis_Price</th>
										<th>Image</th>
										<th>Category</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>


<script src="">

	
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
         var link = $(this).attr("href");

                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = link
                      Swal.fire(
                     'Deleted!',
                     'Your file has been deleted.',
                     'success'
                      )
                    }
                  }) 
              });

            });


</script>
                    

@endsection