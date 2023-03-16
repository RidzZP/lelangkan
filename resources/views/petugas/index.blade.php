@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Pengelolaan Petugas</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Data Petugas</h4>
            <div class="d-flex justify-content-between">
                <form class="search-form" action="petugas" method="GET">
                    <input type="search" class="form-control" id="exampleInputText1" placeholder="Cari..." name="search">
                </form>

                <a class="btn btn-primary" href="/tambah-petugas" role="button"><i data-feather="file-plus"></i>Tambah Petugas</i></a>
            </div>
            <hr class="bg-light">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $index->nama_petugas }}</td>
                            <td>{{ $index->username }}</td>
                            <td>{{ $index->password }}</td>
                            <td>{{ $index->level->level }}</td>
                            <th>
                                <a class="btn btn-success ml-2 mr-2" href="edit-petugas/{{ $index->id }}" role="button"><i data-feather="edit"></i></a>
                                <a class="btn btn-danger" href="hapus-petugas/{{ $index->id }}" role="button"><i data-feather="trash-2"></i></a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection