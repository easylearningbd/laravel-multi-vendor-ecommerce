@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Ecommerce Report</div>
					<div class="ps-3"> 
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Ecommerce Report</li>
							</ol>
						</nav>
					</div>
					 
				</div>
				<!--end breadcrumb-->
				 
				<hr/>
				 
 


<div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
		 

 <form method="post" action="{{ route('search-by-user')}}">
		@csrf
		<div class="col">
			<div class="card">
				 
				<div class="card-body">
					<h5 class="card-title">Search By User</h5>
					 

	  <label class="form-label">Select User:</label>
		<select name="user" class="form-select mb-3" aria-label="Default select example">
		<option selected="">Open this select User</option>
		@foreach($users as $user)
		<option value="{{ $user->id }}">{{ $user->name }}</option>
		 @endforeach
	</select>


		<br>
		<input type="submit" class="btn btn-rounded btn-primary" value="Search">
				</div>
				 
				 
			</div>
		</div>
	</form>



				</div> 

				 
			</div>




@endsection