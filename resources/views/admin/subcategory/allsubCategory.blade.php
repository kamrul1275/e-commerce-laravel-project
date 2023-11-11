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
						<!-- <div class="btn-group">
							
					
		
								<a class="dropdown-item" class="btn btn-primary" href="javascript:;">Create SubCategory</a>
								
								
							</div>
						</div> -->
						<a  class="btn btn-info" href="">Create SubCategory</a>
					</div>
				</div>
				<!--end breadcrumb-->
				
			
				<h6 class="mb-0 text-uppercase">DataTable Import</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>ID</th>
                                        <th>Category Name</th>
										<th>SubCategory Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
				@foreach ($Subcategories as  $key=>$subcategory)

				<tr>
					<td>{{ $key+1}}</td>
					<td>{{$subcategory->Category->category_name}}</td>
					<td>{{$subcategory->subcategory_name}}</td>
					
					
                   
					<td>
						
				<a href="" class="btn btn-success"><i class="las la-edit"></i></a>
				<a href="" id="delete" class="btn btn-danger"><i class="las la-trash"></i></a>

					</td>
					
				</tr>
					
				@endforeach
								
								</tbody>
								<tfoot>
								     <tr>
										<th>ID</th>
										<th>SubCategory Name</th>
                                        <th>Category Name</th>
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