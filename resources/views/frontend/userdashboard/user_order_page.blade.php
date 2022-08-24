@extends('dashboard') 
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
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
        <a class="nav-link active"  href="{{ route('dashboard') }}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.order.page') }}" ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
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
        <a class="nav-link" href="{{ route('user.change.password') }}" ><i class="fi-rs-user mr-10"></i>Change Password</a>
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
            <h3 class="mb-0">Your Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1357</td>
                            <td>March 45, 2020</td>
                            <td>Processing</td>
                            <td>$125.00 for 2 item</td>
                            <td><a href="#" class="btn-small d-block">View</a></td>
                        </tr>
                        <tr>
                            <td>#2468</td>
                            <td>June 29, 2020</td>
                            <td>Completed</td>
                            <td>$364.00 for 5 item</td>
                            <td><a href="#" class="btn-small d-block">View</a></td>
                        </tr>
                        <tr>
                            <td>#2366</td>
                            <td>August 02, 2020</td>
                            <td>Completed</td>
                            <td>$280.00 for 3 item</td>
                            <td><a href="#" class="btn-small d-block">View</a></td>
                        </tr>
                    </tbody>
                </table>
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
        </div>

 


@endsection