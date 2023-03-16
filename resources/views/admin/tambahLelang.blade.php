@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Pendataan Barang</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Tambah Barang Lelang</h4>
            <hr class="bg-light">

            <form action="insert-lelang" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Barang</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="id_barang">
                        <option selected disabled>Pilih Barang</option>
                        @foreach ($barang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Tutup Lelang :</label>
                    <input type="date" class="form-control" id="exampleInputText1" name="tutup_lelang" placeholder="Enter Name">
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a class="btn btn-danger" href="#" role="button">Reset</a>
                </div>
            </form>
        </div>
    </div>
@endsection