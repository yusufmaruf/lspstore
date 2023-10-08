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
                            <h2>Produk<small>Berikut Merupakan Informasi data Penjualan anda</small> </h2>

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
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Nama Pembeli</th>
                                    <th>Total Harga</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @foreach ($transaksi as $item)
                                <tr>

                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->transaction_status }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>
                                        <a href="{{ route('transaksi.show', ['transaksi' => $item->id]) }}"
                                            class="btn btn-primary ">View</a>
                                        <a href="{{ route('transaksi.edit', ['transaksi' => $item->id]) }}"
                                            class="btn btn-secondary ">Update</a>
                                    </td>
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
