@include('partials.header')
<body>
    <div class="card">
        <div class="card-body">
            <div class="text-center pb-5">
                <h3>Laporan Pelelangan Minggu Ini</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Lelang</th>
                            <th>Harga Awal</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang Lelang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
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
                                {{-- Menampilkan pemenag --}}
                                @php
                                    $history = DB::table('tb_history_lelangs')->where('id_lelang', $row->id)->orderBy('penawaran_harga', 'DESC')->first();
                                    $pemenang = isset($history) ? DB::table('tb_masyarakats')->where('id', $history->id_user)->value('nama_lengkap') : '-';
                                @endphp
        
                                {{ $pemenang }}
                            </td>
                            <td>{{ $row->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>

@include('partials.footer')
</body>
