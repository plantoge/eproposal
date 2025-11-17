<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Report Semua Penerimaan <br> Tahun {{$year}}</h5>

<div class="table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered table-hover dt-responsive nowrap">
        <thead>
            <tr>
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" >Uraian</th>
                <th>Penerimaan</th>
            </tr>
            <tr>
                <th>Jumlah</th>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1; $total = 0; ?>
                @foreach($unitlayanan as $i)
                <tr>
                    <td scope="row" class="text-center">{{$no++}}</td>
                    <td>
                    {{-- <a href="{{url('report-date/detail/'.$i->unit_layanan_id.'/'.$date)}}" target="_blank" class="btn btn-link text-secondary">
                        {{$i->layanan}}
                    </a> --}}
                    {{$i->layanan}}
                    </td>
                    <td>{{$i->subharga}}</td>
                </tr>
                <?php 
                    $total = $total + $i->subharga;
                ?>
                @endforeach
            <tr>
                <td colspan="2"><b>Total</b></td>
                <td colspan="1" class="text-left">{{$total}}</td>
            </tr>
        </tbody>
    </table>
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