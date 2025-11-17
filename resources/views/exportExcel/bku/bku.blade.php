<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">LAPORAN BUKU KAS UMUM <br> BULAN {{$bulan}} TAHUN {{$tahun}}</h5>

<table>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Kertas</th>
            <th scope="col">No Bukti</th>
            <th scope="col">Shift</th>
            <th scope="col">Kasir</th>
            <th scope="col">Tanggal Kuitansi</th>
            <th scope="col">Tindakan</th>
            <th scope="col">Debet</th>
            <th scope="col">Kredit</th>
            <th scope="col">Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php $subsaldo = 0; ?>
        <?php $totalpenerimaan = 0; ?>
        <?php $totalpengeluaran = 0; ?>
        @foreach ($benpen as $i)
        <?php 
            if($i->DK == 'D'){$subsaldo = $subsaldo + $i->harga; $totalpenerimaan = $totalpenerimaan + $i->harga;}
            elseif($i->DK == 'K'){$subsaldo = $subsaldo - $i->harga; $totalpengeluaran = $totalpengeluaran + $i->harga;}
        ?>
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$i->no_kertas}}</td>
            <td>{{$i->no_bukti}}</td>
            <td>{{$i->shift}}</td>
            <td>{{$i->keterangan}}</td>
            <td>{{ \Carbon\Carbon::parse($i->tanggal_kuitansi)->format('d-m-Y') }}</td>
            <td>{{$i->tindakan}}</td>
            <td>
                @if ($i->DK == 'D')
                {{$i->harga}}
                @endif
            </td>
            <td>
                @if ($i->DK == 'K')
                {{$i->harga}}
                @endif
            </td>
            <td>
                {{$subsaldo}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <tbody>
        @foreach ($saldo_awal as $item)
        <tr>
            <td>{{$item->jenis_transaksi}}, {{ \Carbon\Carbon::parse($i->tanggal_kuitansi)->format('Y') }}</td>
            <td class="text-end">{{$item->harga}}</td>
        </tr>
        @endforeach
        <tr>
            <td>Saldo Bulan Kemarin</td>
            <td class="text-end">{{$subsaldo_blnlalu}}</td>
        </tr>
        <tr>
            <td>Penerimaan Bulan {{$bulan}}, {{$tahun}}</td>
            <td class="text-end">{{$totalpenerimaan}}</td>
        </tr>
        <tr>
            <td>Pengeluaran Bulan {{$bulan}}, {{$tahun}}</td>
            <td class="text-end">{{$totalpengeluaran}}</td>
        </tr>
        <tr>
            <?php $jumlah = $subsaldo + $subsaldo_blnlalu; ?>
            <td>Jumlah</td>
            <td class="text-end">{{$jumlah}}</td>
        </tr>
    </tbody>
</table>

{{-- <div class="row border border-secondary p-3">
    <div class="row">
        <div class="col-4 text-center">
            <span>MENGETAHUI / MENYETUJUI</span> <br>
            <label>KUASA PENGGUNA ANGGARAN</label> <br>
            <span></span>
            <br><br><br><br><br>
            <span>dr.Desmiarti, Sp.KJ, MARS</span> <br>
            <label>NIP 197009072001122001 </label>
            
        </div>
        <div class="col-4 text-center">
            
        </div>
        <div class="col-4 text-center">
            <span>JAKARTA, {{date('Y-m-d')}}</span> <br>
            <label>BENDAHARA PENERIMAAN</label> <br>
            <span></span>
            <br><br><br><br><br>
            <span>April Shanty, SE</span> <br>
            <label>NIP 197304161992032001</label>
        </div>
    </div>
</div> --}}