@extends('dashboard') 
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Change Password
                </div>
            </div>
        </div>
        <div class="page-content pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
<div class="row">

<!-- // Start Col md 3 menu -->

<div class="col-md-3">
<div class="dashboard-menu">
<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('dashboard') }}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#orders" ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#track-orders" ><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#address" ><i class="fi-rs-marker mr-10"></i>My Address</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.account.page') }}" ><i class="fi-rs-user mr-10"></i>Account details</a>
    </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('user.change.password') }}" ><i class="fi-rs-user mr-10"></i>Change Password</a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
    </li>
</ul>
</div>
</div>
<!-- // End Col md 3 menu -->




<div class="col-md-9">
<div class="tab-content account dashboard-content pl-50">
<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
   <div class="card">
        <div class="card-header">
            <h5>Change Password</h5>
        </div>
        <div class="card-body">
            
            

    <form method="post" action="{{ route('user.update.password') }}" > 
            @csrf

         @if (session('status'))
         <div class="alert alert-success" role="alert">
                {{session('status')}}
         </div>
         @elseif(session('error'))
         <div class="alert alert-danger" role="alert">
            {{session('error')}}
         </div>
         @endif


<div class="row">
    
    <div class="form-group col-md-12">
        <label>Old Password <span class="required">*</span></label>
        <input  class="form-control @error('old_password') is-invalid @enderror"  name="old_password" type="password" id="current_password"    placeholder="Old Password"  />

        @error('old_password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

      <div class="form-group col-md-12">
        <label>New Password <span class="required">*</span></label>
        <input  class="form-control @error('new_password') is-invalid @enderror"  name="new_password" type="password" id="new_password"   placeholder="New Password"  />
        
        @error('new_password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


      <div class="form-group col-md-12">
        <label>Confirm New Password <span class="required">*</span></label>
        <input  class="form-control"  name="new_password_confirmation" type="password" id="new_password_confirmation"  placeholder="Confirm New Password"  /> 
       
    </div>
    
   
    
    <div class="col-md-12">
        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
    </div>
</div>
            </form>
        </div>
    </div>
</div>  

  </div>
   </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>

        



@endsection