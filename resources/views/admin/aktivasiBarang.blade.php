@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Pendataan Lelang</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Barang Yang Sedang Dilelang</h4>
            <div class="d-flex justify-content-between">
                <form class="search-form" action="aktivasi-barang" method="GET">
                    <input type="search" class="form-control" id="exampleInputText1" placeholder="Cari..." name="search">
                </form>

                <a class="btn btn-primary" href="tambah-lelang" role="button"><i data-feather="file-plus"></i>Tambah Lelang</i></a>
            </div>

            <hr class="bg-light">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Lelang</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang Lelang</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index=>$row)
                        <tr>
                            <td>{{ $index + $data->firstItem() }}</td>
                            <td>{{ $row->barang->nama_barang }}</td>
                            <td>{{ $row->tgl_lelang }}</td>
                            @if ($row->harga_akhir == '')
                                <td>-</td>
                            @else
                                <td>{{ number_format($row->harga_akhir) }}</td>
                            @endif
                            {{-- <td>{{ $row->pemenang->user->nama_lengkap }}</td> --}}
                            <td>
                                {{-- Menampilkan pemenag --}}
                                @php
                                    $history = DB::table('tb_history_lelangs')->where('id_lelang', $row->id)->orderBy('penawaran_harga', 'DESC')->first();
                                    $pemenang = isset($history) ? DB::table('tb_masyarakats')->where('id', $history->id_user)->value('nama_lengkap') : '-';
                                @endphp

                                {{ $pemenang }}
                            </td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'dibuka')
                                    <form action="tutup/{{ $row->id }}" method="POST">
                                        @csrf
                                        <div class="text-center">
                                            <button class="btn btn-danger" type="submit">Tutup Lelang</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="buka/{{ $row->id }}" method="POST">
                                        @csrf
                                        <div class="text-center">
                                            <button class="btn btn-primary" type="submit">Buka Lelang</button>
                                        </div>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection