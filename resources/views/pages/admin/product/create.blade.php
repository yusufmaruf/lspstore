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
                    <form action="{{ route('product.store') }}" id="basic-form" method="post" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name Produk</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Cabang</label>
                            <select class="form-control bs4" name="idCategory" style="width: 100%;">
                                <option value="">-Silahkan Pilih Produk-</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->idCategory }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Desc</label>
                            <textarea id="editor" name="desc" class="form-control"></textarea>
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
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.bs4').select2({
                theme: 'bootstrap4',
            })
        });
    </script>
@endpush
