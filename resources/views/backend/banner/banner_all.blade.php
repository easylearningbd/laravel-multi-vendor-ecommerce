@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Banner</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Banner</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('add.banner') }}" class="btn btn-primary">Add Banner</a> 				 
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
				<th>Banner Title </th>
				<th>Banner Url </th>
				<th>Banner Image </th>
				<th>Action</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($banner as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td>{{ $item->banner_title }}</td>
				<td>{{ $item->banner_url }}</td>
				<td> <img src="{{ asset($item->banner_image) }}" style="width: 70px; height:40px;" >  </td>
				
				<td>
  @if(Auth::user()->can('brand.edit'))
<a href="{{ route('edit.banner',$item->id) }}" class="btn btn-info">Edit</a>
@endif
 @if(Auth::user()->can('brand.edit'))
<a href="{{ route('delete.banner',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
@endif

				</td> 
			</tr>
			@endforeach
			 
		 
		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Banner Title </th>
				<th>Banner Url </th>
				<th>Banner Image </th>
				<th>Action</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>
 

				 
			</div>




@endsection