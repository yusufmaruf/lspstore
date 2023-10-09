@extends('pages.user.layouts.master')
@section('content')
    <div class="product-area pb-95">
        <div class="container">
            <div class="section-border section-border-margin-1" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title-timer-wrap bg-white">
                    <div class="section-title-1">
                        <h2>Category</h2>
                    </div>
                </div>
            </div>
            <div class="product-slider-active-1 swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($categories as $item)
                        <a href="{{ route('categories-detail', ['id' => $item->slug]) }}">
                            <div class="swiper-slide">
                                <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                    <div class="product-img img-zoom mb-25">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            style="width: 270px; height: 300px" alt="">
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="product-details.html">{{ $item->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                        class="fa fa-angle-left"></i></div>
                <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                        class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="service-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-img">
                            <img src="assets/images/icon-img/car.png" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-img">
                            <img src="assets/images/icon-img/time.png" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Support 24/7</h3>
                            <p>Support 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-img">
                            <img src="assets/images/icon-img/dollar.png" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Money Return</h3>
                            <p>Back Guarantee Under </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap" data-aos="fade-up" data-aos-delay="800">
                        <div class="service-img">
                            <img src="assets/images/icon-img/discount.png" alt="">
                        </div>
                        <div class="service-content">
                            <h3>Order Discount</h3>
                            <p>Onevery order over $150</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title-tab-wrap mb-75">
                <div class="section-title-2" data-aos="fade-up" data-aos-delay="200">
                    <h2>Hot Products</h2>
                </div>
                <div class="tab-style-1 nav" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('categories') }}">More </a>

                </div>
            </div>
            <div class="tab-content jump">
                <div id="pro-1" class="tab-pane active">
                    <div class="row">
                        @foreach ($productsFirst as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="{{ route('detail', ['id' => $item->slug]) }}">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                style="width: 270px; height: 300px" alt="">
                                        </a>

                                        <div class="product-action-wrap">
                                            <a href="{{ route('detail', ['id' => $item->slug]) }}"
                                                class="product-action-btn-1" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <form action="{{ route('add-cart', ['id' => $item->idProduct]) }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="product-action-btn-2" title="Add To Cart"><i
                                                        class="pe-7s-cart"></i>
                                                    Add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="{{ route('detail', ['id' => $item->slug]) }}">{{ $item->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="new-price">{{ number_format($item->price) }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="pro-3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="assets/images/product/product-5.png" alt="">
                                    </a>

                                    <div class="product-action-wrap">
                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                    <div class="product-action-2-wrap">
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i> Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Interior moderno render</a></h3>
                                    <div class="product-price">
                                        <span class="new-price">$20.25 </span>
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
