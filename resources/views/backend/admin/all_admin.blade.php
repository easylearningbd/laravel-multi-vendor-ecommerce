@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Admin User</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Admin User</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('add.admin') }}" class="btn btn-primary">Add Admin User</a> 				 
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				 
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Sl</th>
				<th>Image </th>
				<th>Name </th>
				<th>Email </th>
				<th>Phone </th>
				<th>Role </th> 
				<th>Action</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($alladminuser as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td> 
				<td> <img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo):url('upload/no_image.jpg') }}" style="width: 50px; height:50px;" >  </td>

				<td>{{ $item->name }}</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->phone }}</td>
				<td>
				@foreach($item->roles as $role)
       <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
				@endforeach
				</td> 
				
				<td>
<a href="{{ route('edit.admin.role',$item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('delete.admin.role',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>

				</td> 
			</tr>
			@endforeach
			 
		 
		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Image </th>
				<th>Name </th>
				<th>Email </th>
				<th>Phone </th>
				<th>Role </th> 
				<th>Action</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>
 

				 
			</div>




@endsection