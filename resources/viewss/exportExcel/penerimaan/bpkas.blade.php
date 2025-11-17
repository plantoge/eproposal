<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Buku Pembantu Kas <br> Bulan {{$bulan}} Tahun {{$tahun}}</h5>

<table id="datatabl" class="table table-sm table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Tanggal <br> transaksi </th>
            <th>Nomor Bukti</th>
            <th>Uraian</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @php $subsaldo = 0; @endphp
        @foreach ($data as $i)
            @php
                
                if($i->DK == 'D'){$subsaldo = $subsaldo + $i->harga;}
                elseif($i->DK == 'K'){$subsaldo = $subsaldo - $i->harga;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_kuitansi)->format('d F Y') }}</td>
                <td>{{$i->no_bukti}}</td>
                <td>{{$i->tindakan}}</td>
                <td>
                    @if($i->DK == 'D') {{$i->harga}} @endif
                </td>
                <td>
                    @if($i->DK == 'K') {{$i->harga}} @endif
                </td>
                <td>{{$subsaldo}}</td>
            </tr>
        @endforeach
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