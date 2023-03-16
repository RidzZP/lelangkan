@extends('layouts.main')

@section('konten')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
        <h4 class="mb-3 mb-md-0">Menu Laporan Pelelangan</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Laporan</h4>
            <div class="d-flex justify-content-between">
                <form action="filter" method="GET">
                    <div class="d-flex justify-content-between">
                        <input type="date" class="form-control" id="exampleInputText1" name="tglAwal">
                        <input type="date" class="form-control" id="exampleInputText1" name="tglAkhir">

                        <button class="btn btn-primary"> Filter </button>
                    </div>
                </form>

                {{-- <a class="btn btn-warning ml-2 mr-2" href="print-laporan" target="blank" role="button"><i data-feather="printer"></i></a> --}}

                <button class="btn btn-warning ml-2 mr-2" onclick="printLelang()" target="blank" role="button"><i data-feather="printer"></i></button>
            </div>

            <hr class="bg-light">

            <div class="table-responsive">
                <table class="table table-hover" id="tabel-lelang">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Lelang</th>
                            <th>Harga Awal</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang Lelang</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $row)
                                @if ($row->status == 'ditutup')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->barang->nama_barang }}</td>
                                        <td>{{ $row->tgl_lelang }}</td>
                                        <td>{{ number_format($row->barang->harga_awal) }}</td>
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

    <script>
        function printLelang(){
            var tglAwal = document.getElementsByName('tglAwal')[0].value;
            var tglAkhir = document.getElementsByName('tglAkhir')[0].value;
            var printKonten = document.createElement('div');
            printKonten.appendChild(document.getElementById('tabel-lelang').cloneNode(true));
            printKonten.appendChild(document.createTextNode('Data Dari ' + tglAwal + ' sampai ' + tglAkhir));
            var originalKonten = document.body.innerHTML;
            document.body.innerHTML = printKonten.innerHTML;
            window.print();
            document.body.innerHTML = originalKonten;
        }
    </script>
@endsection