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

<form id="formtahap3" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-xxl-stretch p-5">
        <div class="card-header">
            <div class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark mb-2">Administrasi (#{{$proposal->PROPOSAL_KODE}})</span>

                <div class="alert alert-dismissible bg-light-primary border border-primary border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-5">
                    <i class="ki-duotone ki-message-text-2 fs-2hx text-primary me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    <!--end::Icon-->

                    <div class="d-flex flex-column pe-0 pe-sm-10">
                        <span class="text-dark mt-1 fw-bold fs-7">
                            <span class="fs-6">Informasi!</span> Silahkan melakukan pembayaran sesuai dengan ketentuan "Klik Biaya".
                        </span>
                    </div>

                </div>
                
                <span class="proposaltahap3" hidden>{{$proposal->PROPOSAL_ID}}</span>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-lg-10 mb-3"> 
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading mb-4">Rekening Bank {{$informasi->NAMA_BANK}}</h4>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="">
                                        <div class="mr-3">
                                            <img src="{{asset('/images/BMRI.png')}}" alt="user" height="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <h5 class="text-dark mb-1 font-16 font-weight-medium">
                                        {{$informasi->PEMILIK_REKENING}}
                                    </h5>
                                    <h5 class="text-dark mb-1 font-16 font-weight-medium">
                                        {{$informasi->NOMOR_REKENING}}
                                    </h5>
                                </div>
                            </div>
                        <hr>
                        <div class="d-flex justify-content-between">

                            <p class="mb-0 text-justify">*selanjutnya upload bukti transfer.</p>
                            <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#kt_modal_2">Biaya</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-1"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="sertifikat_gcp" class="form-label bg-light-success required">
                            Upload Bukti Transfer 
                        </label> <br>
                        {{-- <label class="form-label"> CP: {{$informasi->CP_KAJI_ETIK}} ({{$informasi->WA_KAJI_ETIK}})</label> --}}
                        <input class="form-control form-control-lg" id="file_bukti_transfer" name="file_bukti_transfer" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="bukti_error" class="text-danger"></small>
                            <small class="text-dark">jpeg, jpg, pdf maks. 2MB</small>
                        </div>
                        @if($proposal->PROPOSAL_BUKTI_BAYAR != NULL) 
                            <small>
                                <a href="{{asset('/storage/FILE_BUKTI_BAYAR/'.$proposal->PROPOSAL_BUKTI_BAYAR)}}" class="btn btn-link btn-sm">{{$proposal->PROPOSAL_BUKTI_BAYAR}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>

            @if($proposal->PROPOSAL_IZIN_PENELITIAN_DRAFT != NULL)
            <hr>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Pemberitahuan!</strong> Pelaksanaan Penelitian .. dengan menghubungi : Nama PJ
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- <small class="text-dark">
                Arahan:
                <ol>
                    <li>Peneliti melakukan pembayaran</li>
                    <li>operator akan melakukan pengecekan apakah sudah benar di transfer</li>
                    <li>jika sudah, operator akan melakukan upload draft ijin penelitian dari rspi</li>
                    <li>jika sudah upload izin penelitian draf, maka akan muncul informasi PJ pelaksanaan penelitian</li>
                    <li>dari sisi tampilan peneliti pada tahap 3, akan muncul informasi contact person pelaksanaan penelitian</li>
                </ol>
            </small> --}}
            <div class="row">
                <div class="col-12">
                    @if($proposal->PROPOSAL_IZIN_PENELITIAN_DRAFT == NULL)
                        <button class="btn btn-sm btn-success float-end">Selanjutnya</button>
                    @endif
                    <a href="{{url('/')}}" class="btn btn-sm btn-dark float-end me-2">Kembali</a>
                </div>
            </div>
        </div>

    </div>
</form>

<div class="modal bg-body fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-none">
            <div class="modal-header">
                <h5 class="modal-title">Informasi Biaya</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            {!! $informasi->DESKRIPSI_BIAYA !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
     $(document).ready(function() {
        // $('#submitButton').on('click', function(e) {
        $('#formtahap3').submit(function(e) {
            e.preventDefault();
            let csrfToken    = $('input[name="_token"]').val();
            const idproposal = $('.proposaltahap3').text(); 
            let file         = new FormData($('#formtahap3')[0]);
            // let deskripsi = tinymce.get('deskripsi').getContent()
            // file.append('deskripsi', deskripsi)

            console.log(file, 'tahap3');

            $.ajax({
                type: 'POST',
                url: `{{url('/pengajuan-proposal/${idproposal}/tahap-3')}}`,
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
                        console.log(data);

                        let file_bukti_transfer = data.errors.file_bukti_transfer
                                                
                        file_bukti_transfer  ? $('#bukti_error').html('<b>'+file_bukti_transfer+'</b>') : $('#bukti_error').html('<b></b>') 

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
                                window.location.href = `{{url('pengajuan-proposal')}}`;
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
