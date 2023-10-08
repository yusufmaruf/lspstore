@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush


@section('title')
    Dashboard
@endsection

@section('pages')
    Tambah Product
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Tambah Produk</h2>
                </div>
                <div class="body">
                    <form action="{{ route('user.update', ['user' => $user->id]) }}" id="basic-form" method="post"
                        novalidate enctype="multipart/form-data">

                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" class="form-control" name="address_one" value="{{ $user->address_one }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password <br> <small>Masukan Password baru jika mau diubah</small></label>
                            <input type="password" class="form-control" name="password" value="{{ $user->password }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Provinsi</label>
                            <select id="selectProv" class="form-control bs4" name="provinces_id" style="width: 100%;">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Kota</label>
                            <select id="selectRegenc" class="form-control bs4" name="regencies_id" style="width: 100%;">

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('select2/js/select2.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {

            $("#selectProv").select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih Provinsi',
                ajax: {
                    url: "{{ route('provinsi.index') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });
            $("#selectProv").change(function() {
                let id = $('#selectProv').val();

                $("#selectRegenc").select2({
                    placeholder: 'Pilih Wilayah',
                    ajax: {
                        url: "{{ url('admin/selectRegenc') }}/" + id,
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    }
                                })
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush
