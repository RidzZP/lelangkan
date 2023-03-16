@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Pendataan Barang</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Detail Barang {{ $data->nama_barang }}</h4>

            <div class="foto text-center">
                <img src="{{ asset('assets/images/'.$data->foto_barang) }}" class="w-30 h-30 rounded" alt="">
            </div>

            <table class="mb-3">
                <tr>
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td>{{ $data->nama_barang }}</td>
                </tr>
                <tr>
                    <td>Tanggal/Tahun</td>
                    <td>:</td>
                    <td>{{ $data->tgl }}</td>
                </tr>
                <tr>
                    <td>Harga Awal</td>
                    <td>:</td>
                    <td>{{ number_format($data->harga_awal, 2) }}</td>
                </tr>
                <tr>
                    <td>Deskripsi Barang</td>
                    <td>:</td>
                    <td> - {{ $data->deskripsi_barang }}</td>
                </tr>
            </table>
            <div class="aksi text-center">
                <a class="btn btn-secondary" href="/pendataan-barang" role="button"><i data-feather="chevrons-left"></i> Kembali</a>
            </div>
        </div>
    </div>
@endsection