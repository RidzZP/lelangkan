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

			<form action="/insert-barang" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputText1">Nama Barang :</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="nama_barang" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Tanggal/Tahun :</label>
                    <input type="date" class="form-control" id="exampleInputText1" name="tgl" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber1">Harga Awal :</label>
                    <input type="number" class="form-control" id="exampleInputNumber1" name="harga_awal">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi Barang :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi_barang" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber1">Foto Barang :</label>
                    <input type="file" class="form-control" id="exampleInputNumber1" name="foto_barang">
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a class="btn btn-danger" href="#" role="button">Reset</a>
                </div>
            </form>
        </div>
    </div>
@endsection