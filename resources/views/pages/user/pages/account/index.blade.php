 @extends('pages.user.layouts.master')
 @section('content')
     <div class="my-account-wrapper pb-100 pt-100">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <!-- My Account Page Start -->
                     <div class="myaccount-page-wrapper">
                         <!-- My Account Tab Menu Start -->
                         <div class="row">
                             <div class="col-lg-3 col-md-4">
                                 <div class="myaccount-tab-menu nav" role="tablist">
                                     <a href="#dashboad" class="active" data-bs-toggle="tab">Dashboard</a>
                                     <a href="#orders" data-bs-toggle="tab">Orders</a>

                                     <a href="#address-edit" data-bs-toggle="tab">Address</a>
                                     <a href="#account-info" data-bs-toggle="tab">Account Details</a>
                                     <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                             class="fa fa-power-off"></i>Logout</a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>

                                 </div>
                             </div>
                             <!-- My Account Tab Menu End -->
                             <!-- My Account Tab Content Start -->
                             <div class="col-lg-9 col-md-8">
                                 <div class="tab-content" id="myaccountContent">
                                     <!-- Single Tab Content Start -->
                                     @include('pages.user.pages.account.dashboard')
                                     <!-- Single Tab Content End -->
                                     <!-- Single Tab Content Start -->
                                     <div class="tab-pane fade" id="orders" role="tabpanel">
                                         <div class="myaccount-content">
                                             <h3>Orders</h3>
                                             <div class="myaccount-table table-responsive text-center">
                                                 <table class="table table-bordered">
                                                     <thead class="thead-light">
                                                         <tr>
                                                             <th>Order</th>
                                                             <th>Date</th>
                                                             <th>Status</th>
                                                             <th>Total</th>
                                                             <th>Action</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($transaction as $item)
                                                             <tr>
                                                                 <td>{{ $item->id }}</td>
                                                                 <td>{{ $item->created_at }}</td>
                                                                 <td>{{ $item->transaction_status }}</td>
                                                                 <td>{{ number_format($item->total_price) }}</td>
                                                                 <td><a href="{{ route('invoice.show', ['invoice' => $item->id]) }}"
                                                                         class="check-btn sqr-btn ">View</a>
                                                                     <a href="{{ route('invoice.cetak', ['invoice' => $item->id]) }}"
                                                                         class="check-btn sqr-btn ">Cetak</a>
                                                                 </td>
                                                             </tr>
                                                         @endforeach

                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- Single Tab Content End -->
                                     <!-- Single Tab Content Start -->
                                     @include('pages.user.pages.account.address')
                                     <!-- Single Tab Content End -->
                                     <!-- Single Tab Content Start -->
                                     <div class="tab-pane fade" id="account-info" role="tabpanel">
                                         <div class="myaccount-content">
                                             <h3>Account Details</h3>
                                             <div class="account-details-form">
                                                 <form action="{{ route('account.update', ['account' => $account->id]) }}"
                                                     enctype="multipart/form-data" method="POST">
                                                     @method('PUT')
                                                     @csrf
                                                     <div class="single-input-item">
                                                         <label for="name">Name</label>
                                                         <input type="text" name="name" class="form-control"
                                                             value="{{ $account->name }}" />
                                                     </div>
                                                     <div class="single-input-item">
                                                         <label for="email" class="required">Email Addres</label>
                                                         <input type="email" name="email" class="form-control"
                                                             value="{{ $account->email }}" />
                                                     </div>
                                                     <div class="single-input-item">
                                                         <label for="email" class="required">Phone Number</label>
                                                         <input type="text" name="phone_number" class="form-control"
                                                             value="{{ $account->phone_number }}" />
                                                     </div>
                                                     <div class="single-input-item">
                                                         <label for="email" class="required">Address</label>
                                                         <input type="text" name="address_one" class="form-control"
                                                             value="{{ $account->address_one }}" />
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Password <br> <small>Masukan Password baru jika mau
                                                                 diubah</small></label>
                                                         <input type="password" class="form-control" name="password"
                                                             value="{{ $account->password }}" required>
                                                     </div>
                                                     <div class="single-input-item btn-hover">
                                                         <button class="check-btn sqr-btn">Save Changes</button>
                                                     </div>
                                                 </form>
                                             </div>
                                         </div>
                                     </div> <!-- Single Tab Content End -->
                                 </div>
                             </div> <!-- My Account Tab Content End -->
                         </div>
                     </div> <!-- My Account Page End -->
                 </div>
             </div>
         </div>
     </div>
 @endsection
