{{-- @extends('layout.panel.masterPanel')

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
@endsection --}}

    <div class="card card-xxl-stretch p-5">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fs-2 fw-bolder text-dark">Dokumen Akhir</span>
                <span class="text-muted mt-1 fw-bold fs-7">#{{$proposal->PROPOSAL_KODE}}, Silahkan Upload Laporan Penelitian dan Raw Data Penelitian untuk mendapatkan Surat Izin Penelitian resmi dari RSPI Sulianti Saroso.</span>
                <span class="proposal" hidden>{{$proposal->PROPOSAL_ID}}</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="file_laporan_penelitian" class="form-label">Laporan Penelitian</label> <br>
                        <input class="form-control form-control-lg " id="file_laporan_penelitian" name="file_laporan_penelitian" type="file" disabled>
                        <div class="d-flex justify-content-between">
                            <small id="file_laporan_penelitian_error" class="text-danger"></small>
                            <small class="text-dark">pdf & 2MB</small>
                        </div>
                        @if($proposal->PROPOSAL_LAPORAN_PENELITIAN != NULL) 
                            <small>
                                <a href="{{asset('/storage/FILE_LAPORAN_PENELITIAN/'.$proposal->PROPOSAL_LAPORAN_PENELITIAN)}}" class="btn btn-link btn-sm">{{$proposal->PROPOSAL_LAPORAN_PENELITIAN}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="file_raw_data" class="form-label">Raw Data Penelitian</label> <br>
                        <input class="form-control form-control-lg " id="file_raw_data" name="file_raw_data" type="file" disabled>
                        <div class="d-flex justify-content-between">
                            <small id="file_raw_data_error" class="text-danger"></small>
                            <small class="text-dark">pdf & 2MB</small>
                        </div>
                        @if($proposal->PROPOSAL_RAW_DATA_PENELITIAN != NULL) 
                            <small>
                                <a href="{{asset('/storage/FILE_RAW_DATA_PENELITIAN/'.$proposal->PROPOSAL_RAW_DATA_PENELITIAN)}}" class="btn btn-link btn-sm">{{$proposal->PROPOSAL_RAW_DATA_PENELITIAN}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>

            {{-- <small class="text-dark">
                Arahan:
                <ol>
                    <li>Peneliti diharuskan menghubungi contact person dari masing-masing.</li>
                    <li>Dari output 3 bagian di atas berupa file / surat yang akan di upload di atas.</li>
                    <li>Status akan berubah "Berkas Tahap 2 tersimpan" jika peneliti sudah upload</li>
                    <li>Operator akan melihat file tersebut, jika sudah operator akan mengganti status nya ke tahap 3</li>
                    <li>Operator bisa melakukan ke tahap selanjutnya jika proses dari ke 3 itu ada yang lama (in paralel)</li>
                </ol>
            </small> --}}
            

            <div class="row">
                <div class="col-12">
                    <a href="{{url('/')}}" class="btn btn-sm btn-dark float-end me-2">Kembali</a>
                </div>
            </div>
        </div>

    </div>

@section('js')

@endsection
