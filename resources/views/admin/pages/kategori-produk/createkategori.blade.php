@extends('admin.layouts.app')

@section('title', 'Admin')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kategori Produk</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ url('/admin/kategori-produk') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/admin/kategori-produk" method="POST" enctype="multipart/form-data"
                                    class="row">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label>Nama Kategori</label>
                                        <input type="text"
                                            class="form-control @error('nama_kategori') is-invalid @enderror"
                                            name="nama_kategori" value="{{ old('name') }}" required autofocus
                                            autocomplete="off">
                                        @error('nama_kategori')
                                            <div class="invalid-feedback">
                                                Silahkan masukkan kategori yang benar
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary float-right" type="submit">Tambah</button>
                                    </div>
                                </form>
                            </div>
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
@endpush
