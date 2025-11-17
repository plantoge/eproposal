<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Report Semua Penerimaan <br> Tanggal {{$date}}</h5>

<table class="table table-striped table-bordered table-hover table-sm">
    <thead>
      <tr>
        <th colspan="7" class="text-center bg-success text-white"><b>TRANSAKSI</b></th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-bottom border-gray-300">
        <th colspan="1" class="text-start align-middle">No</th>
        <th colspan="1" class="text-start align-middle">Tanggal Kuitansi</th>
        <th colspan="3" class="text-start align-middle">Uraian</th>
        <th colspan="1" class="text-start align-middle">Item</th>
        <th colspan="1" class="text-start align-middle">Jumlah</th>
      </tr>
        <?php $no = 1; $total = 0; $item = 0; ?>
        @foreach($tindakan as $i)
          <tr class="border-bottom border-gray-300">
            <th scope="row" class="text-center">{{$no++}}</th>
            <td>{{ \Carbon\Carbon::parse($i->tanggal_kuitansi)->format('d/M/Y') }}</td>
            {{-- <td>{{ \Carbon\Carbon::parse($i->tanggal_kuitansi)->format('h:m:s / d-M-Y') }}</td> --}}
            <td colspan="3">{{$i->tindakan}}</td>
            <td>{{$i->item}}</td>
            <td>{{$i->subharga}}</td>
          </tr>
          <?php 
              $total = $total + $i->subharga;
              $item = $item + $i->item;
          ?>
        @endforeach
      <tr class="border-bottom border-gray-300">
        <td colspan="5">
          <b data-bs-toggle="tooltip" data-bs-placement="left" title="(a)">Total Pendapatan</b>
        </td>
        <td colspan="1">{{$item}}</td>
        <td colspan="1" class="text-left fw-bold"><b>{{$total}}</b></td>
      </tr>

      <tr>
        <td colspan="6" class="text-end"><b>Tunai</b></td>
        <td colspan="1" class="text-left">{{$ctt['tunai']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-end"><b>EDC</b></td>
        <td colspan="1" class="text-left">{{$ctt['edc']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-end"><b>Qris</b></td>
        <td colspan="1" class="text-left">{{$ctt['qris']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-end"><b>VA</b></td>
        <td colspan="1" class="text-left">{{$ctt['va']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-end"><b>Transfer</b></td>
        <td colspan="1" class="text-left">{{$ctt['transfer']}}</td>
      </tr>
      {{-- <tr>
        <td colspan="6" class="text-end"><b>Bendahara (depo)</b></td>
        <td colspan="1" class="text-left">{{$ctt['deposit']}}</td>
      </tr> --}}
      <tr class="border-bottom border-gray-300">
        <td colspan="6" class="text-end">
          <b data-bs-toggle="tooltip" data-bs-placement="left" title="(b)">Pengembalian (depo)</b>
        </td>
        <td colspan="1" class="text-left">{{$ctt['pengembalian_deposit']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-start">
          <b data-bs-toggle="tooltip" data-bs-placement="left" title="(c)">Pengembalian Transaksi</b>
        </td>
        <td colspan="1" class="text-left">{{$ctt['returnall']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-start">
          <b data-bs-toggle="tooltip" data-bs-placement="left" title="(d)">Deposit Hari ini (tunai)</b>
        </td>
        <td colspan="1" class="text-left">{{$sumuangmuka['tunai']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-start">
          <b>Deposit Hari ini (non tunai)</b>
        </td>
        <td colspan="1" class="text-left">{{$sumuangmuka['nontunai']}}</td>
      </tr>
      <tr>
        <td colspan="6" class="text-start"><b data-bs-toggle="tooltip" data-bs-placement="left" title="S = ( a+d ) - b - c">Setoran</b></td>
        @php  
          $setoran = ($ctt['tunai'] + $sumuangmuka['tunai']) - $ctt['pengembalian_deposit'] - $ctt['returnall'];
        @endphp
        <td colspan="1" class="text-left">{{$setoran}}</td>
      </tr>
      
    </tbody>
    @role('bendahara_penerimaan')
    <thead>
      <tr>
        <th colspan="7" class="text-center bg-primary text-white"><b>RINCIAN DEPOSIT</b></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>No.</th>
        <th>tanggal Input</th>
        <th>tanggal Awal (Deposit)</th>
        <th>Nomor MR</th>
        <th colspan="2">Nama</th>
        <th>Saldo Deposit</th>
      </tr>
      @php 
        $ttlsaldo = 0;
        // $ttlpenerimaan = 0;
        // $ttlpengembalian = 0;
      @endphp
      @foreach ($uangmuka as $um)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ \Carbon\Carbon::parse($um->created_at)->format('d/M/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($um->tanggal_awal)->format('d/M/Y') }}</td>
            <td>{{$um->nomor_mr}}</td>
            <td colspan="2">{{$um->nama_pasien}}</td>
            <td>{{$um->saldo}}</td>
          </tr>

          @php 
            $ttlsaldo = $ttlsaldo + $um->saldo;
            // $ttlpenerimaan = $ttlpenerimaan + $um->uang_penerimaan;
            // $ttlpengembalian = $ttlpengembalian + $um->uang_pengembalian;
          @endphp
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"><b>Total</b></td>
        <td>{{$ttlsaldo}}</td>
        {{-- <td>{{$ttlpenerimaan}}</td>
        <td>{{$ttlpengembalian}}</td> --}}
      </tr>
    </tfoot>
    @endrole
</table>

{{-- <table class="table table-striped table-bordered table-hover table-sm">
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
            <tr>
                <td colspan="4" class="text-end"><b>Tunai</b></td>
                <td colspan="1" class="text-left">{{$ctt->tunai}}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-end"><b>EDC</b></td>
                <td colspan="1" class="text-left">{{$ctt->edc}}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-end"><b>Qris</b></td>
                <td colspan="1" class="text-left">{{$ctt->qris}}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-end"><b>Transfer</b></td>
                <td colspan="1" class="text-left">{{$ctt->transfer}}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-end"><b>VA</b></td>
                <td colspan="1" class="text-left">{{$ctt->va}}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-end"><b>Total</b></td>
                <td colspan="1" class="text-left fw-bold"><b>{{$ctt->tunai + $ctt->edc + $ctt->qris + $ctt->transfer + $ctt->va}}</b></td>
              </tr>
    </tbody>
</table> --}}
