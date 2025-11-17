<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Report Semua Penerimaan <br> Tahun {{$year}}</h5>

<table class="table table-striped table-bordered table-hover table-sm">
    <thead>
        <tr>
            <th rowspan="2" class="text-center">No</th>
            <th rowspan="2">Tanggal Kuitansi</th>
            <th rowspan="2" >Uraian</th>
            <th rowspan="2" >Item</th>
            <th>Penerimaan</th>
        </tr>
        <tr>
            <th>Jumlah</th>
        </tr>
        </thead>
        <tbody>
            <?php $no = 1; $total = 0; $item = 0; ?>
            @foreach($tindakan as $i)
            <tr>
                <th scope="row" class="text-center">{{$no++}}</th>
                <td>{{ \Carbon\Carbon::parse($i->tanggal_kuitansi)->format('h:m:s / d-M-Y') }}</td>
                <td>{{$i->tindakan}}</td>
                <td>{{$i->item}}</td>
                <td>{{$i->subharga}}</td>
            </tr>
            <?php 
                $total = $total + $i->subharga;
                $item = $item + $i->item;
            ?>
            @endforeach
            <tr>
                <td colspan="3"><b>Total</b></td>
                <td colspan="1">{{$item}}</td>
                <td colspan="1" class="text-left">{{$total}}</td>
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