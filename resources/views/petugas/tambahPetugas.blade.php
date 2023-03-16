@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Pengelolaan Petugas</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Tambah Petugas</h4>
            <hr class="bg-light">

			<form action="/insert-petugas" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputText1">Nama Petugas :</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="nama_petugas" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Username :</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="username" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber1">Password :</label>
                    <input type="password" class="form-control" id="exampleInputNumber1" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Level</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="id_level">
                        <option selected disabled>Pilih Level</option>
                        @foreach ($level as $item)
                            <option value="{{ $item->id }}">{{ $item->level }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Simpan</button>

                    <a class="btn btn-danger" href="#" role="button">Reset</a>
                </div>
            </form>
        </div>
    </div>
@endsection