@extends('layouts.main2')

@section('konten')
<div class="card">
    <div class="card-body">
        <h4 class="text-center mb-5">Penawaran</h4>
        <hr class="bg-light">

        <form action="/update-penawaran/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputNumber1">Penawaran :</label>
                <input type="number" class="form-control" id="exampleInputNumber1" name="penawaran_harga" value="{{ $data->penawaran_harga }}">
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">Simpan</button>

                <a class="btn btn-danger" href="insert-tawar" role="button">Reset</a>
            </div>
        </form>
    </div>
</div>
@endsection