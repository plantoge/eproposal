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
            <span class="card-label fw-bolder text-dark">Pengajuan Penelitian</span>
            <span class="text-muted mt-1 fw-bold fs-7">List data tersebut</span>
        </h3>
        {{-- <div class="card-toolbar">
            <a href="{{url('panel-berita/create')}}" class="btn btn-primary">Buat</a>
        </div> --}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordere gy-5 dt-responsiv nowrap">
                        <thead>
                            <tr class="fw-semibold fs-0 text-muted">
                                <th>No.</th>
                                <th>Aksi</th>
                                <th>Kode</th>
                                <th>Dibuat</th>
                                <th>Laporan Penelitian</th>
                                <th>Raw Data Penelitian</th>
                                <th>Izin Penelitian</th>
                                <th>Peneliti Utama</th>
                                <th>Tim Peneliti</th>
                                <th>WA/HP</th>
                                <th>Institusi Asal</th>
                                <th>Judul Penelitian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penelitian as $data)
                            
                            <tr class="align-middle">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger text-white btn-delete-pengajuan disabled" hidden data-pengajuan="{{$data->PROPOSAL_ID}}">
                                        Batalkan
                                    </button>
                                    <button 
                                    class="btn btn-sm btn-primary modalupload" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalupload"
                                    data-proposal="{{$data->PROPOSAL_ID}}"
                                    data-kode="{{$data->PROPOSAL_KODE}}">
                                    Upload
                                </button>
                                </td>
                                <td>#{{$data->PROPOSAL_KODE}}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s')}}
                                </td>
                                <td>
                                    @if ($data->PENELITIAN_LAPORAN)
                                        <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->PENELITIAN_LAPORAN)}}" class="btn btn-link btn-sm" target="new">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->PENELITIAN_RAW_DATA)
                                        <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->PENELITIAN_RAW_DATA)}}" class="btn btn-link btn-sm" target="new">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->PENELITIAN_SURAT_IZIN)
                                        <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->PENELITIAN_SURAT_IZIN)}}" class="btn btn-link btn-sm" target="new">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>{{$data->PROPOSAL_PENELITI_UTAMA}}</td>
                                <td>{{$data->PROPOSAL_TIM_PENELITI}}</td>
                                <td>{{$data->PROPOSAL_PHONE}}</td>
                                <td>{{$data->PROPOSAL_INSTITUSI_ASAL}}</td>
                                <td>{{$data->PROPOSAL_JUDUL_PENELITIAN}}</td>
                                {{-- <td>
                                    @if($data->PROPOSAL_LAPORAN_PENELITIAN)
                                    <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->PROPOSAL_LAPORAN_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_RAW_DATA_PENELITIAN)
                                    <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->PROPOSAL_RAW_DATA_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td> --}}
        
                            </tr>
        
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Aksi</th>
                                <th>Kode</th>
                                <th>Dibuat</th>
                                <th>Laporan Penelitian</th>
                                <th>Raw Data Penelitian</th>
                                <th>IZIN PENELITIAN</th>
                                <th>Peneliti Utama</th>
                                <th>Tim Peneliti</th>
                                <th>WA/HP</th>
                                <th>Institusi Asal</th>
                                <th>Judul Penelitian</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalupload">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="formupload">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title title_modal">Upload Izin Penelitian</h5>

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
                                <label for="izin_penelitian" class="form-label">Surat Izin Penelitian</label>
                                <input class="form-control form-control-lg" id="izin_penelitian" name="izin_penelitian" type="file">
                                <small id="izin_penelitianError" class="text-danger"></small> <br>
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
    </script>
    <script>
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
                    url: `{{url('/antrian-laporan-penelitian/${id}/update')}}`,
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

                            let izin_penelitian = data.errors.izin_penelitian
                                                    
                            izin_penelitian ? $('#izin_penelitianError').html('<b>'+izin_penelitian+'</b>') : $('#izin_penelitianError').html('<b></b>') 

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
                                    window.location.href = `{{url('antrian-laporan-penelitian')}}`;
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