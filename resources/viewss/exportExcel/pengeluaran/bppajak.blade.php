<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Buku Pembantu Pajak<br> Bulan {{$bulan}} Tahun {{$tahun}}</h5>

<table id="datatabl" class="table table-sm table-striped table-bordered text-center">
    <thead>
        <tr >
            <th class="align-middle text-center" rowspan="2">Tanggal</th>
            <th class="align-middle text-center" rowspan="2">Nomor</th>
            <th class="align-middle text-center" rowspan="2">Uraian</th>
            <th class="align-middle text-center" colspan="5">Debit</th>
            <th class="align-middle text-center" rowspan="2">Kredit</th>
            <th class="align-middle text-center" rowspan="2">Saldo</th>
        </tr>
        <tr>
            <th class="align-middle text-center">PPN</th>
            <th class="align-middle text-center">PPh Ps 21</th>
            <th class="align-middle text-center">PPh Ps 22</th>
            <th class="align-middle text-center">PPh Ps 23</th>
            <th class="align-middle text-center">Lain-lain</th>
        </tr>
    </thead>
    <tbody>
        @php $total_debit = 0; @endphp
        @php $total_kredit = 0; @endphp
        @php $subsaldo_ppn = 0; @endphp
        @foreach ($ppn as $i)
            @php
                if($i->statusdk_ppn == 'D'){$subsaldo_ppn = $subsaldo_ppn + $i->debit_ppn; $total_debit = $total_debit + $i->debit_ppn;}
                elseif($i->statusdk_ppn == 'K'){$subsaldo_ppn = $subsaldo_ppn - $i->kredit_ppn; $total_kredit = $total_kredit + $i->kredit_ppn;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>{{$i->debit_ppn}}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->kredit_ppn}}</td>
                <td>{{$subsaldo_ppn}}</td>
            </tr>
        @endforeach
    {{-- ----------------------------------------------------------------------------------------------- --}}
        @php $subsaldo_pph21 = 0 + $subsaldo_ppn; @endphp
        @foreach ($pph21 as $i)
            @php
                if($i->statusdk_pph21 == 'D'){$subsaldo_pph21 = $subsaldo_pph21 + $i->debit_pph21; $total_debit = $total_debit + $i->debit_pph21;}
                elseif($i->statusdk_pph21 == 'K'){$subsaldo_pph21 = $subsaldo_pph21 - $i->kredit_pph21; $total_kredit = $total_kredit + $i->kredit_pph21;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>0</td>
                <td>{{$i->debit_pph21}}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->kredit_pph21}}</td>
                <td>{{$subsaldo_pph21}}</td>
            </tr>
        @endforeach
    {{-- ----------------------------------------------------------------------------------------------- --}}
        @php $subsaldo_pph22 = 0 + $subsaldo_pph21; @endphp
        @foreach ($pph22 as $i)
            @php
                if($i->statusdk_pph22 == 'D'){$subsaldo_pph22 = $subsaldo_pph22 + $i->debit_pph22; $total_debit = $total_debit + $i->debit_pph22;}
                elseif($i->statusdk_pph22 == 'K'){$subsaldo_pph22 = $subsaldo_pph22 - $i->kredit_pph22; $total_kredit = $total_kredit + $i->kredit_pph22;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->debit_pph22}}</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->kredit_pph22}}</td>
                <td>{{$subsaldo_pph22}}</td>
            </tr>
        @endforeach
    {{-- ----------------------------------------------------------------------------------------------- --}}
        @php $subsaldo_pph23 = 0 + $subsaldo_pph22; @endphp
        @foreach ($pph23 as $i)
            @php
                if($i->statusdk_pph23 == 'D'){$subsaldo_pph23 = $subsaldo_pph23 + $i->debit_pph23; $total_debit = $total_debit + $i->debit_pph23;}
                elseif($i->statusdk_pph23 == 'K'){$subsaldo_pph23 = $subsaldo_pph23 - $i->kredit_pph23; $total_kredit = $total_kredit + $i->kredit_pph23;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->debit_pph23}}</td>
                <td>0</td>
                <td>{{$i->kredit_pph23}}</td>
                <td>{{$subsaldo_pph23}}</td>
            </tr>
        @endforeach
    {{-- ----------------------------------------------------------------------------------------------- --}}
        @php $subsaldo_pasal4ayat2 = 0 + $subsaldo_pph23; @endphp
        @foreach ($pasal4ayat2 as $i)
            @php
                if($i->statusdk_pasal4ayat2 == 'D'){$subsaldo_pasal4ayat2 = $subsaldo_pasal4ayat2 + $i->debit_pasal4ayat2; $total_debit = $total_debit + $i->debit_pasal4ayat2;}
                elseif($i->statusdk_pasal4ayat2 == 'K'){$subsaldo_pasal4ayat2 = $subsaldo_pasal4ayat2 - $i->kredit_pasal4ayat2; $total_kredit = $total_kredit + $i->kredit_pasal4ayat2;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->debit_pasal4ayat2}}</td>
                <td>{{$i->kredit_pasal4ayat2}}</td>
                <td>{{$subsaldo_pasal4ayat2}}</td>
            </tr>
        @endforeach
    {{-- ----------------------------------------------------------------------------------------------- --}}
        @php $subsaldo_setoranlain = 0 + $subsaldo_pasal4ayat2; @endphp
        @foreach ($setoranlain as $i)
            @php
                if($i->statusdk_setoranlain == 'D'){$subsaldo_setoranlain = $subsaldo_setoranlain + $i->debit_setoranlain; $total_debit = $total_debit + $i->debit_setoranlain;}
                elseif($i->statusdk_setoranlain == 'K'){$subsaldo_setoranlain = $subsaldo_setoranlain - $i->kredit_setoranlain; $total_kredit = $total_kredit + $i->kredit_setoranlain;}
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_transaksi)->format('d F Y') }}</td>
                <td>{{$i->jenis_anggaran}}/{{ sprintf("%05d", $i->nomor_spby) }}</td>
                <td>{{$i->desk_pengeluaran}}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{$i->debit_setoranlain}}</td>
                <td>{{$i->kredit_setoranlain}}</td>
                <td>{{$subsaldo_setoranlain}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>Penerimaan Bulan {{$bulan}}, {{$tahun}}</td>
            <td class="text-end">{{$total_debit}}</td>
        </tr>
        <tr>
            <td>Pengeluaran Bulan {{$bulan}}, {{$tahun}}</td>
            <td class="text-end">{{$total_kredit}}</td>
        </tr>
        <tr class="border-top">
            <?php //$jumlah = $subsaldo + $subsaldo_blnlalu; ?>
            <td>Jumlah</td>
            <td class="text-end">{{$total_debit - $total_kredit}}</td>
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