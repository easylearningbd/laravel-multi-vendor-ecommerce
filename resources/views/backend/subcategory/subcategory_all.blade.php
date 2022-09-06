@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All SubCategory</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All SubCategory</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('add.subcategory') }}" class="btn btn-primary">Add SubCategory</a> 				 
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
				<th>Category Name </th>
				<th>SubCategory Name </th>
				<th>Action</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($subcategories as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td> {{ $item['category']['category_name'] }}</td>
				<td> {{ $item->subcategory_name }}  </td>
				
				<td>
 @if(Auth::user()->can('subcategory.edit'))
<a href="{{ route('edit.subcategory',$item->id) }}" class="btn btn-info">Edit</a>
@endif
 @if(Auth::user()->can('subcategory.delete'))
<a href="{{ route('delete.subcategory',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
@endif
				</td> 
			</tr>
			@endforeach
			 
		 
		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Category Name </th>
				<th>SubCategory Name </th>
				<th>Action</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>
 

				 
			</div>




@endsection