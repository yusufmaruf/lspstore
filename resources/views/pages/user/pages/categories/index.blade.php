@extends('pages.user.layouts.master')
@section('content')
    <div class="shop-area shop-page-responsive pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper mb-40">
                        <div class="shop-topbar-left">
                            <div class="showing-item">
                                <span>Showing 1–12 of 60 results</span>
                            </div>
                        </div>
                        <div class="shop-topbar-right">
                            <div class="shop-sorting-area">
                                <select class="nice-select nice-select-style-1">
                                    <option>Default Sorting</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by latest</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                    @if ($products->count() > 0)
                                        @foreach ($products as $item)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                                    <div class="product-img img-zoom mb-25">
                                                        <a href="product-details.html">
                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                style="width: 270px; height: 300px" alt="">
                                                        </a>
                                                        <div class="product-action-wrap">
                                                            <button class="product-action-btn-1" title="Quick View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="pe-7s-look"></i>
                                                            </button>
                                                        </div>
                                                        <div class="product-action-2-wrap">
                                                            <button class="product-action-btn-2" title="Add To Cart"><i
                                                                    class="pe-7s-cart"></i> Add to cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="product-details.html">{{ $item->name }}</a></h3>
                                                        <div class="product-price">
                                                            <span class="new-price">{{ $item->price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <P>Belum Ada Produk</P>
                                    @endif
                                </div>
                                <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">
                                    <ul>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="next" href="#"><i class=" ti-angle-double-right "></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-wrapper">
                        <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                            {{-- <div class="search-wrap-2">
                                <form class="search-2-form" action="#">
                                    <input placeholder="Search*" type="text">
                                    <button class="button-search"><i class=" ti-search "></i></button>
                                </form>
                            </div> --}}
                        </div>
                        {{-- <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="sidebar-widget-title mb-30">
                                <h3>Filter By Price</h3>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Price:</label>
                                        <input type="text" id="amount" name="price"
                                            placeholder="Add Your Price" />
                                    </div>
                                    <button type="button">Filter</button>
                                </div>
                            </div>
                        </div> --}}
                        <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="sidebar-widget-title mb-25">
                                <h3>Product Categories</h3>
                            </div>
                            <div class="sidebar-list-style">
                                <ul>

                                    @foreach ($categories as $item)
                                        <li><a href="{{ route('categories-detail', ['id' => $item->slug]) }}">{{ $item->name }}
                                                <span></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
