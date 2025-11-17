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
            <span class="card-label fw-bolder text-dark">Pengajuan Penelitian #{{$data->PROPOSAL_KODE}}</span>
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
                                    @if($data->PROPOSAL_PENELITI_UTAMA) 
                                        {{$data->PROPOSAL_PENELITI_UTAMA}} 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tim Peneliti</td>
                                <td>
                                    @if($data->PROPOSAL_TIM_PENELITI) 
                                        {{$data->PROPOSAL_TIM_PENELITI}} 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Judul Penelitian</td>
                                <td>
                                    @if($data->PROPOSAL_JUDUL_PENELITIAN) 
                                        {{$data->PROPOSAL_JUDUL_PENELITIAN}} 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Surat Permohonan</td>
                                <td>
                                    @if($data->PROPOSAL_SURAT_PENGANTAR)
                                        <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->PROPOSAL_SURAT_PENGANTAR)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_SURAT_PENGANTAR}}</a>  
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Proposal Penelitian</td>
                                <td>
                                    @if($data->PROPOSAL_PROPOSAL_PENELITIAN) 
                                        <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->PROPOSAL_PROPOSAL_PENELITIAN)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_PROPOSAL_PENELITIAN}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kaji Etik</td>
                                <td>
                                    @if($data->PROPOSAL_KAJI_ETIK) 
                                        <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->PROPOSAL_KAJI_ETIK)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_KAJI_ETIK}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Sertifikat GCP</td>
                                <td>
                                    @if($data->PROPOSAL_SERTIFIKAT_GCP) 
                                        <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->PROPOSAL_SERTIFIKAT_GCP)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_SERTIFIKAT_GCP}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kaji Etik RSPI</td>
                                <td>
                                    @if($data->PROPOSAL_KAJI_ETIK_RSPI) 
                                        <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$data->PROPOSAL_KAJI_ETIK_RSPI)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_KAJI_ETIK_RSPI}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">PKS</td>
                                <td>
                                    @if($data->PROPOSAL_PKS) 
                                        <a href="{{Storage::url('FILE_PKS/'.$data->PROPOSAL_PKS)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_PKS}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">MTA</td>
                                <td>
                                    @if($data->PROPOSAL_MTA) 
                                        <a href="{{Storage::url('FILE_MTA/'.$data->PROPOSAL_MTA)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_MTA}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pernyataan Kerahasiaan Data</td>
                                <td>
                                    @if($data->PROPOSAL_KERAHASIAAN) 
                                        <a href="{{Storage::url('FILE_KERAHASIAAN/'.$data->PROPOSAL_KERAHASIAAN)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_KERAHASIAAN}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Bukti Administrasi</td>
                                <td>
                                    @if($data->PROPOSAL_BUKTI_BAYAR) 
                                        <a href="{{Storage::url('FILE_BUKTI_BAYAR/'.$data->PROPOSAL_BUKTI_BAYAR)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_BUKTI_BAYAR}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Draft Izin Penelitian</td>
                                <td>
                                    @if($data->PROPOSAL_IZIN_PENELITIAN_DRAFT) 
                                        <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$data->PROPOSAL_IZIN_PENELITIAN_DRAFT)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_IZIN_PENELITIAN_DRAFT}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Izin Penelitian Resmi</td>
                                <td>
                                    @if($data->PROPOSAL_IZIN_PENELITIAN) 
                                        <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->PROPOSAL_IZIN_PENELITIAN)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_IZIN_PENELITIAN}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Laporan Penelitian Akhir</td>
                                <td>
                                    @if($data->PROPOSAL_LAPORAN_PENELITIAN) 
                                        <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->PROPOSAL_LAPORAN_PENELITIAN)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_LAPORAN_PENELITIAN}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Raw Data Penelitian</td>
                                <td>
                                    @if($data->PROPOSAL_RAW_DATA_PENELITIAN) 
                                        <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->PROPOSAL_RAW_DATA_PENELITIAN)}}" target="_blank" class="text-dark">{{$data->PROPOSAL_RAW_DATA_PENELITIAN}}</a> 
                                    @else 
                                        - 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Perjalanan Data</td>
                                <td>Tahapan {{$data->PROPOSAL_TAHAPAN}} dengan Status: {{$data->PROPOSAL_STATUS}} </td>
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