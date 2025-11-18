@extends('layout.panel.masterPanel')

@section('css')
<link href="{{url('/Twebsite/v1/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
    .dt-buttons {
        float: left !important;
    }
    .dt-buttons button {
        font-size: 11px !important;
    }
    
    .buttons-html5, .buttons-print {
        padding: 0.5em !important;
    }
    
    .dataTables_info {
        float: left !important;
    }

</style>
@endsection

@section('konten')

<div class="card card-xxl-stretch p-5">
    <div class="card-header">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark">Pengajuan Penelitian #{{$data->proposal_kode}}</span>
            <span class="text-muted mt-1 fw-bold fs-7">data detail</span>
        </h3>
        {{-- <div class="card-toolbar">
            <a href="{{url('panel-berita/create')}}" class="btn btn-primary">Buat</a>
        </div> --}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">

                <div class="py-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-400 gy-4">
                            <tr>
                                <td class="fw-bold">Nama Peneliti</td>
                                <td>
                                    @if($data->proposal_peneliti_utama) 
                                        {{$data->proposal_peneliti_utama}} 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tim Peneliti</td>
                                <td>
                                    @if($data->proposal_tim_peneliti) 
                                        {{$data->proposal_tim_peneliti}} 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Judul Penelitian</td>
                                <td>
                                    @if($data->proposal_judul_penelitian) 
                                        {{$data->proposal_judul_penelitian}} 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Surat Permohonan</td>
                                <td>
                                    @if($data->proposal_surat_pengantar)
                                        <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->proposal_surat_pengantar)}}" target="_blank" class="text-dark">{{$data->proposal_surat_pengantar}}</a>  
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Proposal Penelitian</td>
                                <td>
                                    @if($data->proposal_proposal_penelitian) 
                                        <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->proposal_proposal_penelitian)}}" target="_blank" class="text-dark">{{$data->proposal_proposal_penelitian}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kaji Etik</td>
                                <td>
                                    @if($data->proposal_kaji_etik) 
                                        <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->proposal_kaji_etik)}}" target="_blank" class="text-dark">{{$data->proposal_kaji_etik}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Sertifikat GCP</td>
                                <td>
                                    @if($data->proposal_sertifikat_gcp) 
                                        <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->proposal_sertifikat_gcp)}}" target="_blank" class="text-dark">{{$data->proposal_sertifikat_gcp}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kaji Etik RSPI</td>
                                <td>
                                    @if($data->proposal_kaji_etik_rspi) 
                                        <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$data->proposal_kaji_etik_rspi)}}" target="_blank" class="text-dark">{{$data->proposal_kaji_etik_rspi}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">PKS</td>
                                <td>
                                    @if($data->proposal_pks) 
                                        <a href="{{Storage::url('FILE_PKS/'.$data->proposal_pks)}}" target="_blank" class="text-dark">{{$data->proposal_pks}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">MTA</td>
                                <td>
                                    @if($data->proposal_mta) 
                                        <a href="{{Storage::url('FILE_MTA/'.$data->proposal_mta)}}" target="_blank" class="text-dark">{{$data->proposal_mta}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pernyataan Kerahasiaan Data</td>
                                <td>
                                    @if($data->proposal_kerahasiaan) 
                                        <a href="{{Storage::url('FILE_KERAHASIAAN/'.$data->proposal_kerahasiaan)}}" target="_blank" class="text-dark">{{$data->proposal_kerahasiaan}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Bukti Administrasi</td>
                                <td>
                                    @if($data->proposal_bukti_bayar) 
                                        <a href="{{Storage::url('FILE_BUKTI_BAYAR/'.$data->proposal_bukti_bayar)}}" target="_blank" class="text-dark">{{$data->proposal_bukti_bayar}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Draft Izin Penelitian</td>
                                <td>
                                    @if($data->proposal_izin_penelitian_draft) 
                                        <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$data->proposal_izin_penelitian_draft)}}" target="_blank" class="text-dark">{{$data->proposal_izin_penelitian_draft}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Izin Penelitian Resmi</td>
                                <td>
                                    @if($data->proposal_izin_penelitian) 
                                        <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->proposal_izin_penelitian)}}" target="_blank" class="text-dark">{{$data->proposal_izin_penelitian}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Laporan Penelitian Akhir</td>
                                <td>
                                    @if($data->proposal_laporan_penelitian) 
                                        <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->proposal_laporan_penelitian)}}" target="_blank" class="text-dark">{{$data->proposal_laporan_penelitian}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Raw Data Penelitian</td>
                                <td>
                                    @if($data->proposal_raw_data_penelitian) 
                                        <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->proposal_raw_data_penelitian)}}" target="_blank" class="text-dark">{{$data->proposal_raw_data_penelitian}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Perjalanan Data</td>
                                <td>Tahapan {{$data->proposal_tahapan}} dengan Status: {{$data->proposal_status}} </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{url('/Twebsite/v1/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        $("#datatable").DataTable({
            
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'copy',
                text: 'Salin'
              },
              {
                extend: 'csv',
                text: 'CSV'
              },
              {
                extend: 'excel',
                text: 'Excel'
              },
            ],
            searching: true,
            paging: true,
            scrollX: true,
            fixedHeader: true,
        });

        $("#tanggal_presentasi").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i:s",
        });
    </script>
    
@endsection