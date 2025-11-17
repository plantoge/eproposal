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

<form id="formakhir" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-xxl-stretch p-5">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fs-2 fw-bolder text-dark">Dokumen Akhir</span>
                <span class="text-muted mt-1 fw-bold fs-7">#{{$proposal->PROPOSAL_KODE}}, Silahkan upload Laporan Penelitian dan Raw Data Penelitian untuk mendapatkan Surat Izin Penelitian resmi dari RSPI Prof. Dr. Sulianti Saroso</span>
                <span class="proposal" hidden>{{$proposal->PROPOSAL_ID}}</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="file_laporan_penelitian" class="form-label required">Laporan Penelitian</label> <br>
                        <input class="form-control form-control-lg" id="file_laporan_penelitian" name="file_laporan_penelitian" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="file_laporan_penelitian_error" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                        @if($proposal->PROPOSAL_LAPORAN_PENELITIAN != NULL) 
                            <small>
                                <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$proposal->PROPOSAL_LAPORAN_PENELITIAN)}}" class="btn btn-link btn-sm">{{$proposal->PROPOSAL_LAPORAN_PENELITIAN}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="file_raw_data" class="form-label required">Raw Data Penelitian</label> <br>
                        <input class="form-control form-control-lg" id="file_raw_data" name="file_raw_data" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="file_raw_data_error" class="text-danger"></small>
                            <small class="text-dark">Excel maks. 2.5MB</small>
                        </div>
                        @if($proposal->PROPOSAL_RAW_DATA_PENELITIAN != NULL) 
                            <small>
                                <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$proposal->PROPOSAL_RAW_DATA_PENELITIAN)}}" class="btn btn-link btn-sm">{{$proposal->PROPOSAL_RAW_DATA_PENELITIAN}}</a>
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
                    <button class="btn btn-sm btn-success float-end">Selanjutnya</button>
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
        $('#formakhir').submit(function(e) {
            e.preventDefault();
            let csrfToken    = $('input[name="_token"]').val();
            const idproposal = $('.proposal').text(); 
            let file         = new FormData($('#formakhir')[0]);
            // let deskripsi = tinymce.get('deskripsi').getContent()
            // file.append('deskripsi', deskripsi)

            $.ajax({
                type: 'POST',
                url: `{{url('/pengajuan-proposal/${idproposal}/tahap-4')}}`,
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

                        let file_laporan_penelitian = data.errors.file_laporan_penelitian
                        let file_raw_data           = data.errors.file_raw_data
                                                
                        file_laporan_penelitian ? $('#file_laporan_penelitian_error').html('<b>'+file_laporan_penelitian+'</b>') : $('#file_laporan_penelitian_error').html('<b></b>') 
                        file_raw_data           ? $('#file_raw_data_error').html('<b>'+file_raw_data+'</b>')                     : $('#file_raw_data_error').html('<b></b>') 

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
