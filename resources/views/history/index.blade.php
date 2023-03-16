@extends('layouts.main2')

@section('konten')
<div class="card">
    <div class="card-body">
        <div class="text-center pb-5">
            <h3>History Penawaran</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Penawaran Harga</th>
                        <th>Status Lelang</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($history as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->barang->nama_barang }}</td>
                        <td>{{ number_format($row->barang->harga_awal) }}</td>
                        <td>{{ number_format($row->penawaran_harga) }}</td>
                        <td>{{ $row->lelang->status }}</td>
                        @if ($row->lelang->status == 'dibuka')
                            <td class="text-center"><a class="btn btn-success ml-2 mr-2" href="edit-penawaran/{{ $row->id }}" role="button"><i data-feather="edit"></i></a></td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </div>
</div>

@endsection