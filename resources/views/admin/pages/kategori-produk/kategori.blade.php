@extends('admin.layouts.app')

@section('title', 'Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    {{-- Delete Modal --}}
    <div class="modal fade" id="deletebutton" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <form action="" method="POST" class="d-inline" id="formHapus">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" id="deletebtn">Hapus data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir modal --}}

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Table Kategori</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ url('/admin/produk/create') }}" class="btn btn-warning mr-3">Tambah Produk</a>
                    <a href="{{ url('/admin/kategori-produk/create') }}" class="btn btn-primary">Tambah Kategori</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h4>Table Test</h4> --}}
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table-md table" id="listingTable">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_kategori }}</td>
                                                <td>
                                                    <a href="/admin/kategori-produk/{{ $item->id }}/edit"
                                                        class="btn btn-warning">Ubah</a>
                                                    <button type="button" class="btn btn-danger hapus" data-toggle="modal"
                                                        data-target="#deletebutton" data-id="{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item active">
                                            <a class="page-link" onclick="prevPage()" href="#" tabindex="-1"><i
                                                    class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item ">
                                            <span id="page" class="page-link"></span>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" onclick="nextPage()" href="#"><i
                                                    class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- Page --}}
    <script src="{{ asset('admin/js/pagetable.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('admin/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/js/page/components-table.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('admin/js/page/modules-toastr.js') }}"></script>
    <script src="{{ asset('admin/library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/js/page/modules-sweetalert.js') }}"></script>

    {{-- @if (@session('success'))
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
    @endif --}}

    <script>
        $(document).on('click', '.hapus', function() {
            let id = $(this).attr('data-id');;
            $("#formHapus").attr('action', `/admin/kategori-produk/${id}`);
        });
    </script>
@endpush
