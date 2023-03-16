@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Pendataan Barang</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Data Barang Lelang</h4>
            <div class="d-flex justify-content-between">
                <form class="search-form" action="pendataan-barang" method="GET">
                    <input type="search" class="form-control" id="exampleInputText1" placeholder="Cari..." name="search">
                </form>

                <a class="btn btn-primary" href="/tambah-barang" role="button"><i data-feather="file-plus"></i>Tambah Barang</i></a>
            </div>
            <hr class="bg-light">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Tanggal/Tahun</th>
                            <th>Harga Awal</th>
                            <th>Deskripsi Barang</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index=>$row)
                        <tr>
                            <th>{{ $index + $data->firstItem() }}</th>
                            <th>{{ $row->nama_barang }}</th>
                            <th>{{ $row->tgl }}</th>
                            <th>{{ number_format($row->harga_awal, 2) }}</th>
                            <th>{{ $row->deskripsi_barang }}</th>
                            <th>
                                <a class="btn btn-warning ml-2 mr-2" href="detail-barang/{{ $row->id }}" role="button"><i data-feather="info"></i></a>
                                <a class="btn btn-success ml-2 mr-2" href="edit-barang/{{ $row->id }}" role="button"><i data-feather="edit"></i></a>
                                <a class="btn btn-danger delete-confirm" href="/hapus-barang/{{ $row->id }}" role="button"><i data-feather="trash-2"></i></a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection