@extends('layouts.main2');

@section('konten')
    <div class="card">
        <div class="card-body">
            <div class="text-center pb-5">
                <h3>Pemenang Lelang</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Lelang</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang Lelang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            @if ($row->status == 'dibuka')
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->barang->nama_barang }}</td>
                                    <td>{{ $row->tgl_lelang }}</td>
                                    @if ($row->harga_akhir == '')
                                        <td>-</td>
                                    @else
                                        <td>{{ number_format($row->harga_akhir) }}</td>
                                    @endif
                                    <td>
                                        {{-- Menampilkan pemenang --}}
                                        @php
                                            $history = DB::table('tb_history_lelangs')->where('id_lelang', $row->id)->orderBy('penawaran_harga', 'DESC')->first();
                                            $pemenang = isset($history) ? DB::table('tb_masyarakats')->where('id', $history->id_user)->value('nama_lengkap') : '-';
                                        @endphp

                                        {{ $pemenang }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection