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
    Manage User
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h2>User<small>Berikut Merupakan Informasi data user anda</small> </h2>

                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped t  able-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>address</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


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
    <script>
        let table;
        $(document).ready(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('users.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'address_one'
                    },
                    {
                        data: 'phone_number'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'aksi'
                    },

                ]
            });
        })

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                // Get the CSRF token from the meta tag.
                const csrfToken = $('[name=csrf-token]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': csrfToken,
                        '_method': 'delete'
                    },
                    success: function(response) {
                        table.ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Tidak dapat menghapus data');
                    }
                });
            }
        }
    </script>
@endpush
