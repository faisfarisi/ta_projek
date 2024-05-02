@extends('admin.layouts.app')

@section('title', 'Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/library/summernote/dist/summernote-bs4.css') }}">
    <style>
        #preview img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: center;
            border-radius: .25rem;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Produk</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ url('/admin/produk') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/admin/produk" method="POST" enctype="multipart/form-data" class="row">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label>Nama Kopi</label>
                                        <input type="text"
                                            class="form-control @error('nama_kopi') is-invalid @enderror"
                                            name="nama_kopi" value="{{ old('nama_kopi') }}" required autofocus
                                            autocomplete="off">
                                        @error('nama_kopi')
                                            <div class="invalid-feedback">
                                                Silahkan masukkan nama produk yang benar
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                            name="harga" value="{{ old('harga') }}" required autocomplete="off">
                                        @error('harga')
                                            <div class="invalid-feedback">
                                                Harga tidak valid
                                            </div>
                                        @enderror
                                    </div>



                                    <div class="form-group col-md-4">
                                        <label>Gambar 1</label>
                                        <input type="file" name="gambar1"
                                            class="form-control @error('gambar1') is-invalid @enderror" id="gambar1"
                                            onchange="imagePrev(this, '#tgambar1');" required autocomplete="off"
                                            style="border: none!important">
                                        @error('gambar1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div id="preview">
                                            <img class="mt-3" src="{{ asset('admin/img/noimage.png') }}" id="tgambar1">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <button class="btn btn-primary float-right" type="submit">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('admin/library/summernote/dist/summernote-bs4.js') }}"></script>
    <script>
        function imagePrev(imageUploadKTP, tumb) {
            if (imageUploadKTP.files && imageUploadKTP.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(tumb)
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(imageUploadKTP.files[0]);
            }
        }
    </script>
@endpush
