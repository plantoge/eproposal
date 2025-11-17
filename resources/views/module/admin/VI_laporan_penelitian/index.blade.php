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

    /* blink */
    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }

    .blinking {
        animation: blink 1s infinite;
    }
    
</style>
@endsection

@section('konten')

    @if ($totaldata == 0)
        @include('module/admin/VI_laporan_penelitian/halamankosong')
    @else       

        @foreach ($pengajuanpenelitian as $data)
            
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-5">
                    <div class="card card-dashe">
                        <div class="card-header" style="background-color: #00B9AD !important;">
                            <h3 class="card-title text-white">#{{$data->PROPOSAL_KODE}}</h3>
                            
                            <div class="card-toolbar">
                                @if($data->PENELITIAN_STATUS == null)
                                <button 
                                    class="btn btn-sm btn-warning text-dark modalupload" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalupload"
                                    data-proposal="{{$data->PROPOSAL_ID}}"
                                    data-kode="{{$data->PROPOSAL_KODE}}">
                                    Upload Penelitian
                                </button>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <ol class="list-group list-group-numbered mb-5">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Peneliti</div>
                                        {{$data->PROPOSAL_PENELITI_UTAMA}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Judul Penelitian</div>
                                    {{$data->PROPOSAL_JUDUL_PENELITIAN}}
                                </div>
                                {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                                </li>
                            </ol>

                            <div class="table-responsive">
                                <table class="table table-sm text-center align-midle">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            <th>Laporan Penelitian</th>
                                            <th>Raw Data</th>
                                            <th>Izin Penelitian</th>
                                            <th class="bg-secondary">Surat Pengantar</th>
                                            <th class="bg-secondary">Proposal Penelitian</th>
                                            <th class="bg-secondary">Kaji Etik</th>
                                            <th class="bg-secondary">Sertifikat GCP</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            <td>
                                                @if($data->PENELITIAN_LAPORAN)
                                                    <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->PENELITIAN_LAPORAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                    {{-- <br>
                                                    <small>{{\Carbon\Carbon::parse($data->tanggal_upload_penelitian)->format('d/m/y')}}</small>
                                                    <br>
                                                    <small>{{\Carbon\Carbon::parse($data->tanggal_upload_penelitian)->format('H:i:s')}}</small> --}}
                                                @else
                                                    <button class="btn btn-link btn-sm">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PENELITIAN_RAW_DATA)
                                                    <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->PENELITIAN_RAW_DATA)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PENELITIAN_LAPORAN && $data->PENELITIAN_RAW_DATA)
                                                    @if($data->PENELITIAN_SURAT_IZIN)
                                                        <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->PENELITIAN_SURAT_IZIN)}}" class="btn btn-link btn-sm blinking text-danger fw-bold" target="_blank">Download</a>
                                                        @else
                                                        <button class="btn btn-link btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Mohon ditunggu, Admin lagi verifikasi..">Belum ada</button>
                                                    @endif
                                                @else
                                                    <button class="btn btn-link btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Laporan Penelitian dulu ya..">Belum ada</button>
                                                @endif
                                            </td>
                                            <td class="bg-secondary">
                                                @if($data->PROPOSAL_SURAT_PENGANTAR)
                                                <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->PROPOSAL_SURAT_PENGANTAR)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm">Kosong</button>
                                                @endif
                                            </td>
                                            <td class="bg-secondary">
                                                @if($data->PROPOSAL_PROPOSAL_PENELITIAN)
                                                <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->PROPOSAL_PROPOSAL_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm">Kosong</button>
                                                @endif
                                            </td>
                                            <td class="bg-secondary">
                                                @if($data->PROPOSAL_KAJI_ETIK)
                                                <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->PROPOSAL_KAJI_ETIK)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm">Kosong</button>
                                                @endif
                                            </td>
                                            <td class="bg-secondary">
                                                @if($data->PROPOSAL_SERTIFIKAT_GCP)
                                                <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->PROPOSAL_SERTIFIKAT_GCP)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm">Kosong</button>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer" style="padding: 0.5rem !important;">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6">
                                    <span class="float-lg-start fw-bold">Pengajuan proposal: {{\Carbon\Carbon::parse($data->tanggal_buat)->format('d/m/Y')}}</span>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <span class="float-lg-end fw-bold">
                                        {{-- @if($data->PROPOSAL_STATUS == null)
                                            Status: <span class="badge badge-danger blinkin">Belum ada</span>
                                        @else
                                            Status: <span class="badge badge-danger blinkin">{{$data->PROPOSAL_STATUS}}</span>
                                        @endif  --}}
                                    </span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        {{ $pengajuanpenelitian->links() }}

        <div class="modal fade" tabindex="-1" id="modalupload">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="formupload">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title title_modal">Upload Penelitian</h5>
        
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>
        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="mb-5 fv-row fv-plugins-icon-container">
                                        <label for="laporan_penelitian" class="form-label">Laporan Penelitian</label>
                                        <input class="form-control form-control-lg" id="laporan_penelitian" name="laporan_penelitian" type="file">
                                        <small id="laporan_penelitianError" class="text-danger"></small>
                                        <small class="fw-bold">PDF, Max: 2048kb</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="mb-5 fv-row fv-plugins-icon-container">
                                        <label for="raw_data" class="form-label">Raw Data Penelitian</label>
                                        <input class="form-control form-control-lg" id="raw_data" name="raw_data" type="file">
                                        <small id="raw_dataError" class="text-danger"></small>
                                        <small class="fw-bold">PDF, Max: 2048kb</small>
                                        <span class="proposal" hidden></span>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif

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
        });

        $(document).ready(function() {
            $('.modalupload').on('click', function(){
                let proposal = $(this).data('proposal');
                let kode = $(this).data('kode');

                $('.title_modal').html('Upload Penelitian #'+kode);
                $('.proposal').html(proposal);
                // $('.formupload').attr('action',`{{url('/laporan-penelitian/${idproposal}/update')}}`);
            })

            // -------------------------------------------------------------------------------------------

            $('.formupload').submit(function(e) {
                e.preventDefault();
                let csrfToken = $('input[name="_token"]').val();
                let file      = new FormData($('.formupload')[0]);
                let id        = $('.proposal').text();
                // let deskripsi = tinymce.get('deskripsi').getContent()
                // file.append('deskripsi', deskripsi)

                $.ajax({
                    type: 'POST',
                    url: `{{url('/laporan-penelitian/${id}/update')}}`,
                    data: file,

                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-HTTP-Method-Override': 'PATCH', //only route patch and delete
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Sedang proses data ke server',
                        didOpen: () => {
                            swal.showLoading()
                        }
                        })
                    },
                    success:function(data){
                        swal.close();
                        
                        if(data.status_code == 422){
                            console.log(data, data.errors);

                            let laporan_penelitian  = data.errors.laporan_penelitian
                            let raw_data = data.errors.raw_data
                                                    
                            laporan_penelitian  ? $('#laporan_penelitianError').html('<b>'+laporan_penelitian+'</b>')   : $('#laporan_penelitianError').html('<b></b>') 
                            raw_data            ? $('#raw_dataError').html('<b>'+raw_data+'</b>')                       : $('#raw_dataError').html('<b></b>') 

                        }else if(data.status_code == 200){
                            Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-success"
                                }
                            }).then((result) => {
                                // Jika tombol "OK" diklik, lakukan redirect
                                if (result.isConfirmed) {
                                    window.location.href = `{{url('laporan-penelitian')}}`;
                                }
                            });
                        }      
                    },
                    error: function(xhr, status, error) {
                        swal.close()                
                        console.log(status)
                        console.log(error)

                        Swal.fire({
                            text: "ada yang salah, hubungi SIMRS",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    },
                });

            });
        })
    </script>
@endsection