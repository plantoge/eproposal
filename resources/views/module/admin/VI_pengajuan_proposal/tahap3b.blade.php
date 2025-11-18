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
                <span class="card-label fw-bolder text-dark mb-2">Pelaksanaan Penelitian (#{{$proposal->proposal_kode}})</span>

                <div class="alert alert-dismissible bg-light-success border border-success border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-5">
                    <i class="ki-duotone ki-message-text-2 fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    <!--end::Icon-->

                    <div class="d-flex flex-column pe-0 pe-sm-10">
                        <span class="text-dark mt-1 fw-bold fs-7">
                            {{-- <span class="fs-6">Informasi!</span>  --}}
                            <p>Pelaksanaan Penelitian sudah bisa dilakukan. Silahkan menghubungi kontak admin untuk informasi lebih lanjut. {{$informasi->CP_KERAHASIAAN ?? '-'}} {{$informasi->WA_KERAHASIAAN ?? '-'}}.</p>
                        </span>
                    </div>

                </div>
                
                <span class="proposaltahap3" hidden>{{$proposal->id}}</span>
            </div>

        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="col col-lg-5 mb-6">
                    <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$proposal->proposal_izin_penelitian_draft)}}" class="card hover-elevate-up shadow-sm parent-hover" target="_blank">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                <i class="fa-regular fa-file-zipper fa-fw fa-2x"></i>
                            </span>
                    
                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Download Draft Izin Penelitian
                            </span>
                        </div>
                    </a>
                </div>
            </div>

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
                    @if($proposal->proposal_izin_penelitian_draft == NULL)
                        <button class="btn btn-sm btn-success float-end">Selanjutnya</button>
                    @endif
                    <a href="{{url('/')}}" class="btn btn-sm btn-dark float-end me-2">Kembali</a>
                </div>
            </div>
        </div>

    </div>
</form>

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
                                                
                        file_bukti_transfer  ? $('#kajietikrspi_error').html('<b>'+file_bukti_transfer+'</b>') : $('#kajietikrspi_error').html('<b></b>') 

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
