<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Buku Pembantu Uang Pihak Ketiga <br> Bulan {{$bulan}} Tahun {{$tahun}}</h5>

<table id="datatabl" class="table table-sm table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Tanggal <br> transaksi </th>
            <th>Nomor</th>
            <th>Uraian</th>
            <th>Akun</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php $subsaldo = $subsaldo_blnlalu; ?>
        <?php $totalpenerimaan = 0; ?>
        <?php $totalpengeluaran = 0; ?>
        @foreach ($data as $i)
            @php
                $subsaldo = $subsaldo + ($i->debit_benpeng - $i->kredit_benpeng);
                if($i->status_dk == 'D'){ $totalpenerimaan = $totalpenerimaan + $i->debit_benpeng;}
                elseif($i->status_dk == 'K'){ $totalpengeluaran = $totalpengeluaran + $i->kredit_benpeng;}
                // if($i->status_dk == 'D'){$subsaldo = $subsaldo + $i->debit_benpeng;}
                // elseif($i->status_dk == 'K'){$subsaldo = $subsaldo - $i->kredit_benpeng;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>{{$i->akun_anggaran}}</td>
                <td>{{$i->debit_benpeng}}</td>
                <td>{{$i->kredit_benpeng}}</td>
                <td>{{$subsaldo}}</td>
            </tr>
            
            {{-- -------------------------------------------------------------------------------------------- --}}
            @if($i->ada_ppn == 1)
                @php 
                    $ppn = DB::table('ppn')->where('id_spby', '=', $i->id)->get();
                @endphp
                @foreach ($ppn as $ppn)
                    @php
                        if($ppn->statusdk_ppn == 'D'){$subsaldo = $subsaldo + $ppn->debit_ppn;}
                        elseif($ppn->statusdk_ppn == 'K'){$subsaldo = $subsaldo - $ppn->kredit_ppn;}
                    @endphp
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$ppn->note_ppn}}</td>
                        <td>-</td>
                        <td>{{$ppn->debit_ppn}}</td>
                        <td>{{$ppn->kredit_ppn}}</td>
                        <td>{{$subsaldo}}</td>
                    </tr>
                @endforeach
            @endif
            {{-- -------------------------------------------------------------------------------------------- --}}
            @if($i->ada_pph21 == 1)
                @php 
                    $pph21 = DB::table('pph21')->where('id_spby', '=', $i->id)->get();
                @endphp
                @foreach ($pph21 as $pph21)
                    @php
                        if($pph21->statusdk_pph21 == 'D'){$subsaldo = $subsaldo + $pph21->debit_pph21;}
                        elseif($pph21->statusdk_pph21 == 'K'){$subsaldo = $subsaldo - $pph21->kredit_pph21;}
                    @endphp
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$pph21->note_pph21}}</td>
                        <td>-</td>
                        <td>{{$pph21->debit_pph21}}</td>
                        <td>{{$pph21->kredit_pph21}}</td>
                        <td>{{$subsaldo}}</td>
                    </tr>
                @endforeach
            @endif
            {{-- -------------------------------------------------------------------------------------------- --}}
            @if($i->ada_pph22 == 1)
                @php 
                    $pph22 = DB::table('pph22')->where('id_spby', '=', $i->id)->get();
                @endphp
                @foreach ($pph22 as $pph22)
                    @php
                        if($pph22->statusdk_pph22 == 'D'){$subsaldo = $subsaldo + $pph22->debit_pph22;}
                        elseif($pph22->statusdk_pph22 == 'K'){$subsaldo = $subsaldo - $pph22->kredit_pph22;}
                    @endphp
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$pph22->note_pph22}}</td>
                        <td>-</td>
                        <td>{{$pph22->debit_pph22}}</td>
                        <td>{{$pph22->kredit_pph22}}</td>
                        <td>{{$subsaldo}}</td>
                    </tr>
                @endforeach
            @endif
            {{-- -------------------------------------------------------------------------------------------- --}}
            @if($i->ada_pph23 == 1)
                @php 
                    $pph23 = DB::table('pph23')->where('id_spby', '=', $i->id)->get();
                @endphp
                @foreach ($pph23 as $pph23)
                    @php
                        if($pph23->statusdk_pph23 == 'D'){$subsaldo = $subsaldo + $pph23->debit_pph23;}
                        elseif($pph23->statusdk_pph23 == 'K'){$subsaldo = $subsaldo - $pph23->kredit_pph23;}
                    @endphp
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$pph23->note_pph23}}</td>
                        <td>-</td>
                        <td>{{$pph23->debit_pph23}}</td>
                        <td>{{$pph23->kredit_pph23}}</td>
                        <td>{{$subsaldo}}</td>
                    </tr>
                @endforeach
            @endif
            {{-- -------------------------------------------------------------------------------------------- --}}
            @if($i->ada_setoranlain == 1)
                @php 
                    $setoranlain = DB::table('setoranlain')->where('id_spby', '=', $i->id)->get();
                @endphp
                @foreach ($setoranlain as $setoranlain)
                    @php
                        if($setoranlain->statusdk_setoranlain == 'D'){$subsaldo = $subsaldo + $setoranlain->debit_setoranlain;}
                        elseif($setoranlain->statusdk_setoranlain == 'K'){$subsaldo = $subsaldo - $setoranlain->kredit_setoranlain;}
                    @endphp
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$setoranlain->note_setoranlain}}</td>
                        <td>-</td>
                        <td>{{$setoranlain->debit_setoranlain}}</td>
                        <td>{{$setoranlain->kredit_setoranlain}}</td>
                        <td>{{$subsaldo}}</td>
                    </tr>
                @endforeach
            @endif
            {{-- -------------------------------------------------------------------------------------------- --}}
        @endforeach
    </tbody>
    <tfoot>
        <tr class="border-top">
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
        <tr class="border-top">
            <?php //$jumlah = $subsaldo + $subsaldo_blnlalu; ?>
            <td>Jumlah</td>
            <td class="text-end">{{$subsaldo}}</td>
        </tr>
    </tfoot>
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