@extends('layouts.main2')

@section('konten')
    {{-- Produk --}}
    <div class="d-flex justify-content-around ml-5">
        <div class="d-flex flex-wrap">
            @foreach ($data as $item)
            @if ($item->status == 'dibuka')
            <div class="card mr-5 mb-3" style="width: 18rem;">
                <img src="{{ asset('assets/images/'.$item->barang->foto_barang) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->barang->nama_barang }}</h4>
                    <p class="">Harga Awal :</p>
                    <a href="data-barang/{{ $item->barang->id }}" class="btn btn-primary">Rp. {{ number_format($item->barang->harga_awal, 2) }}</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection