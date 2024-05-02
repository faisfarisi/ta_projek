@extends('admin.layouts.app')

@section('title', 'Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/library/izitoast/dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/library/chocolat/dist/css/chocolat.css') }}">
    <style>
        .gallery .gallery-item {
            width: 130px !important;
            height: 130px !important;
        }

        .gallery .gallery-more div {
            line-height: 130px !important;
        }

        .gallery .gallery-more:after {
            background-color: rgb(0 0 0 / 30%) !important;
        }

        table.desc {
            width: 95%;
        }

        table.desc td {
            padding: 4px 0px;
        }

        table.desc .left-side {
            width: 10%;
            vertical-align: top;
        }

        table.desc .center-side {
            width: 3%;
            vertical-align: top;
        }

        table.desc .right-side {
            width: 72%;
            vertical-align: center;
        }

        table.desc p,
        table.desc h6 {
            margin: 0px;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Produk</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ url('/admin/produk') }}" class="btn btn-warning mr-2">Kembali</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Stok
                    </button>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4>Detail</h4>
                            </div> --}}
                            <div class="card-body">
                                <table class="desc">
                                    <tr>
                                        <td class="left-side">
                                            <h6>Nama Produk</h6>
                                        </td>
                                        <td class="center-side">
                                            <h6>:</h6>
                                        </td>
                                        <td class="right-side">
                                            <p>{{ $data->nama_produk }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Harga</h6>
                                        </td>
                                        <td>
                                            <h6>:</h6>
                                        </td>
                                        <td>
                                            <p>@rupiah($data->harga)</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Stok</h6>
                                        </td>
                                        <td>
                                            <h6>:</h6>
                                        </td>
                                        <td>
                                            @if ($data->stok <= 10)
                                                <div class="badge badge-danger">{{ $data->stok }}</div>
                                            @else
                                                <div class="badge badge-primary">{{ $data->stok }}</div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Deskripsi</h6>
                                        </td>
                                        <td>
                                            <h6>:</h6>
                                        </td>
                                        <td>
                                            <p>{{ $data->deskripsi }}</p>
                                        </td>
                                    </tr>

                                </table>

                                <div class="gallery mt-2">
                                    @foreach ($data->detailProduk()->get() as $detail)
                                        <div class="gallery-item gallery-more"
                                            data-image="{{ asset('storage/' . $detail->gambar1) }}" data-title="Image 1">
                                            <div>Gambar 1</div>
                                        </div>
                                        @if ($detail->gambar2)
                                            <div class="gallery-item gallery-more"
                                                data-image="{{ asset('storage/' . $detail->gambar2) }}"
                                                data-title="Image 2">
                                                <div>Gambar 2</div>
                                            </div>
                                        @endif
                                        @if ($detail->gambar3)
                                            <div class="gallery-item gallery-more"
                                                data-image="{{ asset('storage/' . $detail->gambar3) }}"
                                                data-title="Image 3">
                                                <div>Gambar 3</div>
                                            </div>
                                        @endif
                                        @if ($detail->gambar4)
                                            <div class="gallery-item gallery-more"
                                                data-image="{{ asset('storage/' . $detail->gambar4) }}"
                                                data-title="Image 4">
                                                <div>Gambar 4</div>
                                            </div>
                                        @endif
                                        @if ($detail->gambar5)
                                            <div class="gallery-item gallery-more"
                                                data-image="{{ asset('storage/' . $detail->gambar5) }}"
                                                data-title="Image 5">
                                                <div>Gambar 5</div>
                                            </div>
                                        @endif
                                        {{-- <div class="gallery-item gallery-more"
                                            data-image="{{ asset('img/news/img04.jpg') }}" data-title="Image 4">
                                            <div>+2</div>
                                        </div> --}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <form action="/admin/produk/{{ $data->id }}/restok" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Stok {{ $data->nama_produk }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="number" class="form-control" name="stok" autocomplete="off" required autofocus>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('admin/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/js/page/bootstrap-modal.js') }}"></script>
    <script src="{{ asset('admin/library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('admin/js/page/modules-toastr.js') }}"></script>

    @if (@session('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'bottomRight',
                message: '{{ @session('success') }}'
            });
        </script>
    @endif
    @if (@session('delete'))
        <script>
            iziToast.error({
                title: '',
                position: 'bottomRight',
                message: '{{ @session('delete') }}',
                icon: 'fa-solid fa-xmark'
            });
        </script>
    @endif
@endpush
