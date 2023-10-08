@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dist/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dist/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/sweetalert/sweetalert.css') }}" />
@endpush

@section('title')
    Dashboard
@endsection

@section('pages')
    Manage Kategori
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h2>Produk<small>Berikut Merupakan Informasi data produk anda</small> </h2>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">

                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped t  able-hover">
                            <thead>
                                <tr>

                                    <th>Produk</th>
                                    <th>Quantity</th>
                                    <th>Total Harga</th>

                                </tr>
                            </thead>
                            @foreach ($transaksi as $item)
                                <tr>

                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach


                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('dist/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('dist/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

    <script src="{{ asset('dist/assets/vendor/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js -->
    <script src=" {{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
@endpush
