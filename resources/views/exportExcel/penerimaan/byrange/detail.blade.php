<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Report Semua Penerimaan <br> Tanggal {{$tanggal_awal}} s/d {{$tanggal_akhir}}</h5>

<div class="table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th >Tanggal Kuitansi</th>
                <th >Tindakan</th>
                <th >Satuan</th>
                <th >Tarif Normal</th>
                <th >Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; $total = 0; ?>
            @foreach($unitlayanan as $i)
            <tr>
                <td class="text-center">{{$no++}}</td>
                <td >{{\Carbon\Carbon::parse($i->tanggal_kuitansi)->format('d/m/Y')}}</td>
                <td >{{$i->tindakan}}</td>
                <td >{{$i->satuan}}</td>
                <td>{{$i->tarif}}</td>
                <td>{{$i->harga}}</td>
            </tr>
            <?php $total = $total + $i->harga; ?>
            @endforeach
            <tr>
                <td colspan="5"><b>Total</b></td>
                <td colspan="1" class="text-left"><b>{{$total}}</b></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row pt-3">
    <div class="col col-lg-6 offset-lg-6">
        <small class="mb-4 float-right">Per Tanggal {{\Carbon\Carbon::parse($tanggal_awal)->format('d/M/Y')}} s/d {{\Carbon\Carbon::parse($tanggal_akhir)->format('d/M/Y')}}</small>
    </div>
</div>

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