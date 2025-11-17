<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Laporan Pertanggung Jawaban (LPJ) Bendahara Penerimaan <br> Bulan {{$bulan}} Tahun {{$tahun}}</h5>

<table id="datatabl" class="table table-sm table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Pembukuan</th>
            <th>saldo Awal</th>
            <th>Penambahan</th>
            <th>Pengurangan</th>
            <th>Saldo Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>BP Kas</td>
            <td>{{$bpkas['total_sebelum']}}</td>
            <td>{{$bpkas['total_debit']}}</td>
            <td>{{$bpkas['total_kredit']}}</td>
            <td>{{$bpkas['total']}}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>BP Tunai</td>
            <td>{{$bptunai['total_sebelum']}}</td>
            <td>{{$bptunai['total_debit']}}</td>
            <td>{{$bptunai['total_kredit']}}</td>
            <td>{{$bptunai['total']}}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>BP Bank</td>
            <td>{{$bpbank['total_sebelum']}}</td>
            <td>{{$bpbank['total_debit']}}</td>
            <td>{{$bpbank['total_kredit']}}</td>
            <td>{{$bpbank['total']}}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>BP Pendapatan</td>
            <td>{{$bppendapatan['total_sebelum']}}</td>
            <td>{{$bppendapatan['total_debit']}}</td>
            <td>{{$bppendapatan['total_kredit']}}</td>
            <td>{{$bppendapatan['total']}}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>BP Uang Di Bendahara Pengeluaran</td>
            <td>{{$bpuangdibp['total_sebelum']}}</td>
            <td>{{$bpuangdibp['total_debit']}}</td>
            <td>{{$bpuangdibp['total_kredit']}}</td>
            <td>{{$bpuangdibp['total']}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>BP Deposito</td>
            <td>{{$bpdeposito['total_sebelum']}}</td>
            <td>{{$bpdeposito['total_debit']}}</td>
            <td>{{$bpdeposito['total_kredit']}}</td>
            <td>{{$bpdeposito['total']}}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>BP Investasi</td>
            <td>{{$bpinvestasi['total_sebelum']}}</td>
            <td>{{$bpinvestasi['total_debit']}}</td>
            <td>{{$bpinvestasi['total_kredit']}}</td>
            <td>{{$bpinvestasi['total']}}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>BP Lainnya</td>
            <td>{{$bplain['total_sebelum']}}</td>
            <td>{{$bplain['total_debit']}}</td>
            <td>{{$bplain['total_kredit']}}</td>
            <td>{{$bplain['total']}}</td>
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