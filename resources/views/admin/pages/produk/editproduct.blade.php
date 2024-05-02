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
                <h1>Edit Produk</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ url('/admin/produk') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/admin/produk/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data" class="row">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group col-md-6">
                                        <label>Nama Produk</label>
                                        <input type="text"
                                            class="form-control @error('nama_produk') is-invalid @enderror"
                                            name="nama_produk" value="{{ old('nama_produk', $data->nama_produk) }}" required
                                            autofocus autocomplete="off">
                                        @error('nama_produk')
                                            <div class="invalid-feedback">
                                                Silahkan masukkan nama produk yang benar
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kategori</label>
                                        <select class="form-control @error('id_kategori') is-invalid @enderror"
                                            name="id_kategori">
                                            @foreach ($data->kategoriProduk()->get() as $detail)
                                                <option value="{{ $data->id_kategori }}">{{ $detail->nama_kategori }}
                                                </option>
                                            @endforeach
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        <small>
                                            tambah kategori <u><a href="{{ url('admin/kategori-produk') }}">disini</a></u>
                                        </small>
                                        @error('id_kategori')
                                            <div class="invalid-feedback">
                                                Silahkan pilih kategori
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                            name="harga" value="{{ old('harga', $data->harga) }}" required
                                            autocomplete="off">
                                        @error('harga')
                                            <div class="invalid-feedback">
                                                Harga tidak valid
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Stok</label>
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                            name="stok" value="{{ old('stok', $data->stok) }}" required
                                            autocomplete="off">
                                        @error('stok')
                                            <div class="invalid-feedback">
                                                Stok tidak valid
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror summernote-simple" name="deskripsi" required
                                            style="height: 240px">
                                            {{ $data->deskripsi }}
                                        </textarea>
                                        {{-- <textarea class=""></textarea> --}}
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                Deskripsi tidak valid
                                            </div>
                                        @enderror
                                    </div>

                                    @foreach ($data->detailProduk()->get() as $detail)
                                        <input type="hidden" name="oldGambar1" value="{{ $detail->gambar1 }}">
                                        <input type="hidden" name="oldGambar2" value="{{ $detail->gambar2 }}">
                                        <input type="hidden" name="oldGambar3" value="{{ $detail->gambar3 }}">
                                        <input type="hidden" name="oldGambar4" value="{{ $detail->gambar4 }}">
                                        <input type="hidden" name="oldGambar5" value="{{ $detail->gambar5 }}">
                                        <div class="form-group col-md-4">
                                            <label>Gambar 1</label>
                                            <input type="file" name="gambar1"
                                                class="form-control @error('gambar1') is-invalid @enderror" id="gambar1"
                                                onchange="imagePrev(this, '#tgambar1');" autocomplete="off"
                                                style="border: none!important" value="{{ $detail->gambar1 }}">
                                            @error('gambar1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div id="preview">
                                                @if ($detail->gambar1)
                                                    <img class="mt-3" src="{{ asset('storage/' . $detail->gambar1) }}"
                                                        id="tgambar1">
                                                @else
                                                    <img class="mt-3" src="{{ asset('admin/img/noimage.png') }}"
                                                        id="tgambar1">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Gambar 2</label>
                                            <input type="file" name="gambar2"
                                                class="form-control @error('gambar2') is-invalid @enderror" id="gambar2"
                                                onchange="imagePrev(this, '#tgambar2');" autocomplete="off"
                                                style="border: none!important" value="{{ $detail->gambar2 }}">
                                            @error('gambar2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div id="preview">
                                                @if ($detail->gambar2)
                                                    <img class="mt-3" src="{{ asset('storage/' . $detail->gambar2) }}"
                                                        id="tgambar2">
                                                @else
                                                    <img class="mt-3" src="{{ asset('admin/img/noimage.png') }}"
                                                        id="tgambar2">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Gambar 3</label>
                                            <input type="file" name="gambar3"
                                                class="form-control @error('gambar3') is-invalid @enderror" id="gambar3"
                                                onchange="imagePrev(this, '#tgambar3');" autocomplete="off"
                                                style="border: none!important" value="{{ $detail->gambar3 }}">
                                            @error('gambar3')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div id="preview">
                                                @if ($detail->gambar3)
                                                    <img class="mt-3" src="{{ asset('storage/' . $detail->gambar3) }}"
                                                        id="tgambar3">
                                                @else
                                                    <img class="mt-3" src="{{ asset('admin/img/noimage.png') }}"
                                                        id="tgambar3">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Gambar 4</label>
                                            <input type="file" name="gambar4"
                                                class="form-control @error('gambar4') is-invalid @enderror" id="gambar4"
                                                onchange="imagePrev(this, '#tgambar4');" autocomplete="off"
                                                style="border: none!important" value="{{ $detail->gambar4 }}">
                                            @error('gambar4')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div id="preview">
                                                @if ($detail->gambar4)
                                                    <img class="mt-3" src="{{ asset('storage/' . $detail->gambar4) }}"
                                                        id="tgambar4">
                                                @else
                                                    <img class="mt-3" src="{{ asset('admin/img/noimage.png') }}"
                                                        id="tgambar4">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Gambar 5</label>
                                            <input type="file" name="gambar5"
                                                class="form-control @error('gambar5') is-invalid @enderror" id="gambar5"
                                                onchange="imagePrev(this, '#tgambar5');" autocomplete="off"
                                                style="border: none!important" value="{{ $detail->gambar5 }}">
                                            @error('gambar5')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div id="preview">
                                                @if ($detail->gambar5)
                                                    <img class="mt-3" src="{{ asset('storage/' . $detail->gambar5) }}"
                                                        id="tgambar5">
                                                @else
                                                    <img class="mt-3" src="{{ asset('admin/img/noimage.png') }}"
                                                        id="tgambar5">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-md-12">
                                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
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
