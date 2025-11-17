@extends('layout.masterExport')

@section('content')
    <h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
    <h5 class="text-center mb-4">Report Semua Penerimaan <br> Bulan {{$bulan}} tahun {{$tahun}}</h5>
    <br>

    <table id="datatable" class="table table-striped table-bordered table-lg">
        <thead>
            <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Uraian</th>
                <th colspan="3" class="text-center align-middle">Penerimaan</th>
                <th colspan="3" class="text-center align-middle">Yang Disetor Ke bank</th>
                <th rowspan="2" class="text-center align-middle">Saldo</th>
            </tr>
            <tr>
                <th class="text-center align-middle">Saldo Awal</th>
                <th class="text-center align-middle">Bulan ini</th>
                <th class="text-center align-middle">Jumlah</th>
                <th class="text-center align-middle">S/D yang lalu</th>
                <th class="text-center align-middle">Bulan ini</th>
                <th class="text-center align-middle">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $grandtotal_saldoawal = 0;
                $grandtotal_bulanini = 0;
                $grandtotal_jumlah = 0;
            @endphp
            @foreach ($layanan as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td colspan="8">{{$item->layanan}}</td>
            </tr>
                @php
                    $ttl_saldoawal = 0;
                    $ttl_blnini = 0;
                    $ttl_jumlah = 0;
                    $bulan_kmrn = $bulan - 1;
                    
                    // query dari tindakan
                    $saldoawal = DB::table('benpen')
                        ->selectRaw('SUM(harga) AS saldo_awal, tindakan_id')
                        ->whereRaw('MONTH(benpen.tanggal_kuitansi) BETWEEN 1 AND '.$bulan_kmrn)
                        ->whereNull('benpen.deleted_at')
                        ->groupBy('benpen.tindakan_id');

                    $benpen = DB::table('benpen')
                        ->selectRaw('SUM(benpen.harga) as total, tindakan_id')
                        ->whereNull('benpen.deleted_at')
                        ->where('benpen.DK', '=', 'D')
                        ->whereMonth('benpen.tanggal_kuitansi', $bulan)
                        ->whereYear('benpen.tanggal_kuitansi', $tahun)
                        ->groupBy('benpen.tindakan_id');

                    $tindakan = DB::table('tindakan')
                        ->leftJoinSub($benpen, 'a', function ($join) {
                            $join->on('tindakan.id', '=', 'a.tindakan_id');
                        })
                        ->leftJoinSub($saldoawal, 'b', function ($join) {
                            $join->on('tindakan.id', '=', 'b.tindakan_id');
                        })
                        ->whereNull('tindakan.deleted_at')
                        ->where('unit_layanan_id', $item->id)
                        ->get(); 
                @endphp

                @foreach ($tindakan as $i)
                    @php 
                        $ttl_saldoawal = $ttl_saldoawal + $i->saldo_awal;
                        $ttl_blnini = $ttl_blnini + $i->total;
                        $ttl_jumlah = $ttl_jumlah + ($i->saldo_awal+$i->total);
                    @endphp
                    <tr>
                        <td></td>
                        <td>{{$i->tindakan}}</td>
                        <td>{{$i->saldo_awal}}</td>
                        <td>{{$i->total}}</td>
                        <td>{{$i->saldo_awal+$i->total}}</td>
                        <td>{{$i->saldo_awal}}</td>
                        <td>{{$i->total}}</td>
                        <td>{{$i->saldo_awal+$i->total}}</td>
                        <td></td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="2">Total</td>
                        <td>{{$ttl_saldoawal}}</td>
                        <td>{{$ttl_blnini}}</td>
                        <td>{{$ttl_jumlah}}</td>
                        <td>{{$ttl_saldoawal}}</td>
                        <td>{{$ttl_blnini}}</td>
                        <td>{{$ttl_jumlah}}</td>
                        <td></td>
                    </tr>
                    @php 
                        $grandtotal_saldoawal = $grandtotal_saldoawal + $ttl_saldoawal;
                        $grandtotal_bulanini = $grandtotal_bulanini + $ttl_blnini;
                        $grandtotal_jumlah = $grandtotal_jumlah + $ttl_jumlah;
                    @endphp
            @endforeach
            <tr class="border-bottom border-top fw-bold">
                <td colspan="2">Total Semua</td>
                <td>{{$grandtotal_saldoawal}}</td>
                <td>{{$grandtotal_bulanini}}</td>
                <td>{{$grandtotal_jumlah}}</td>
                <td>{{$grandtotal_saldoawal}}</td>
                <td>{{$grandtotal_bulanini}}</td>
                <td>{{$grandtotal_jumlah}}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="3">
                    MENGETAHUI / MENYETUJUI
                </td>
                <td colspan="2"></td>
                <td colspan="3">
                    JAKARTA, {{date('Y-m-d')}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label>KUASA PENGGUNA ANGGARAN</label>
                </td>
                <td colspan="2"></td>
                <td colspan="3">
                    <label>BENDAHARA PENERIMAAN</label>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="3">
                    dr.Desmiarti, Sp.KJ, MARS
                </td>
                <td colspan="2"></td>
                <td colspan="3">
                    April Shanty, SE
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label>NIP 197009072001122001 </label>
                </td>
                <td colspan="2"></td>
                <td colspan="3">
                    <label>NIP 197304161992032001</label>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection