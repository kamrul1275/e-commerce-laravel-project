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
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							
								<a class="dropdown-item" href="javascript:;">Create SubCategory</a>
								
								
							</div>
						</div>
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
										<th>Name</th>
                                        <th>Category Name</th>
										<th>Description</th>
										<th>Start date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
				@foreach ($Subcategories as  $key=>$subcategory)

				<tr>
					<td>{{ $key+1}}</td>
					<td>{{$subcategory->name}}</td>
                    <td>{{$subcategory->Category->name}}</td>
					<td>{!! $subcategory->description !!}</td>
					<td>{{$subcategory->created_at->format('d-m-Y') }}</td>
					<td>
						
				<a href="" class="btn btn-success"><i class="las la-edit"></i></a>
				<a href="" class="btn btn-danger"><i class="las la-trash"></i></a>

					</td>
					
				</tr>
					
				@endforeach




								
						
								
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Name</th>
                                        <th>Category Name</th>
										<th>Description</th>
										<th>Start date</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>


                    

@endsection