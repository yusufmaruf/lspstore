@extends('pages.user.layouts.master')
@section('content')
    <div class="checkout-main-area pb-100 pt-100">
        <div class="container">
            <div class="checkout-wrap pt-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label> Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="{{ $user->name }}" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                        <input placeholder="Apartment, suite, unit etc." name="address_one"
                                            value="{{ $user->address_one }}" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="phone_number" value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            <ul>
                                                <li>Product <span>Total</span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                @foreach ($cart as $item)
                                                    <li>{{ $item->product->name }} X {{ $item->quantity }} <span>$
                                                            {{ number_format($item->product->price * $item->quantity) }}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-subtotal">
                                            <ul>
                                                <li>Subtotal <span>{{ number_format($subtotal) }} </span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <li>tax <p>{{ number_format($tax) }} </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>Total <span>{{ number_format($total) }} </span></li>
                                                <input type="hidden" name="total_price" value="{{ $total }}">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="mt-4 mb-2">Pilih Pembayaran</label>
                                        <select name="pay" id="" class="form-control">
                                            <option value="">Pilih Pembayaran</option>
                                            <option value="paypal">Paypal</option>
                                            <option value="bank">Bank Transfer</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="Place-order btn-hover">
                                    <button type="submit" class="btn btn-dark">Place Order</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
