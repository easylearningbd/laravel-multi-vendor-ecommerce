@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Seo Setting</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Seo Setting</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
				 
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							 
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">

		<form method="post" action="{{ route('seo.setting.update') }}"  >
			@csrf
		
		<input type="hidden" name="id" value="{{ $seo->id }}">

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Title</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="meta_title" value="{{ $seo->meta_title }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Author</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Keyword</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Description </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="meta_description" class="form-control" value="{{ $seo->meta_description }}" />
				</div>
			</div>
 



			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
				</div>
			</div>
		</div>

		</form>



	</div>
	 



							</div>
						</div>
					</div>
				</div>
			</div>

 



@endsection