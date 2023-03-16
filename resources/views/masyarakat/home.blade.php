@extends('layouts.main2')

@section('konten')
    {{-- Slider --}}
    <div id="carouselExampleSlidesOnly" class="carousel slide mb-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/images/slider6.jpg" class="d-block" style="width: 100%; height: 360px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/images/slider4.jpg" class="d-block" style="width: 100%; height: 360px" alt="...">
            </div>
        </div>
    </div>

    {{-- Produk --}}
    <div class="d-flex justify-content-around ml-5">
        <div class="d-flex flex-wrap">
            @foreach ($data as $item)
            @if ($item->status == 'dibuka')
            <div class="card mr-5 mb-4" style="width: 18rem;">
                <img src="{{ asset('assets/images/'.$item->barang->foto_barang) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->barang->nama_barang }}</h4>
                    <p class="">Harga Awal :</p>
                    <a href="data-barang/{{ $item->barang->id }}" class="btn btn-primary">Rp. {{ number_format($item->barang->harga_awal) }}</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
@endsection