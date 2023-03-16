@extends('layouts.main2')

@section('konten')
<div class="d-flex justify-content-center">
    <div class="d-flex flex-wrap">
        <div class="card mr-5 mb-3" style="width: 30rem;">
            <img src="{{ asset('assets/images/'.$data->foto_barang) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="pb-3">{{ $data->nama_barang }}</h4>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5>Deskripsi Barang :</h5>
                        <p>{{ $data->deskripsi_barang }}</p>
                    </div>
                </div>
                <h5 class="font-weight-normal pb-3">Harga Awal : <b><u>{{ number_format($data->harga_awal, 2) }}</u></b></h5>
                <a href="/tawar-barang/{{ $data->id }}" class="btn btn-primary btn-block active" role="button" aria-pressed="true">Tawar</a>
                <a href="/" class="btn btn-danger btn-block active" role="button" aria-pressed="true">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection