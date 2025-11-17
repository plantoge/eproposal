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

<form id="formsaya" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-xxl-stretch p-5">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Ajukan Proposal Penelitian</span>
                {{-- <span class="text-muted mt-1 fw-bold fs-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis vel id quibusdam quos quam pariatur.</span> --}}
            </h3>
            {{-- <div class="card-toolbar">
                <a href="{{url('/pengajuan-proposal')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </div> --}}
        </div>
        <div class="card-body">
            {{-- <div class="row">
                <div class="col-sm-12 col-lg-7">
                    <h2>Kode: #qwe324</h2>
                    <br>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-sm-12 col-lg-7">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label required">Nama Peneliti Utama</label>
                        <input type="text" id="peneliti_utama" name="peneliti_utama" value="{{old('peneliti_utama')}}" class="form-control mb-2">
                        <small id="peneliti_utamaError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-7">
                    
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label required">Anggota Tim Peneliti</label>
                        <textarea id="tim_peneliti" name="tim_peneliti" rows="4" class="form-control">{{old('tim_peneliti')}}</textarea>
                        <small id="tim_penelitiError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label required">Judul Penelitian</label>
                        <textarea id="judul_penelitian" name="judul_penelitian" rows="4" class="form-control">{{old('judul_penelitian')}}</textarea>
                        <small id="judul_penelitianError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            {{-- <div class="separator my-10"></div> --}}
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="surat_pengantar" class="form-label required">Surat Permohonan</label>
                        <input class="form-control form-control-lg" id="surat_pengantar" name="surat_pengantar" type="file">
                        
                        <div class="d-flex justify-content-between">
                            <small id="surat_pengantarError" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="proposal_penelitian" class="form-label required">Proposal Penelitian</label>
                        <input class="form-control form-control-lg" id="proposal_penelitian" name="proposal_penelitian" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="proposal_penelitianError" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="kaji_etik" class="form-label">Kaji Etik</label>
                        <input class="form-control form-control-lg" id="kaji_etik" name="kaji_etik" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="kaji_etikError" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="sertifikat_gcp" class="form-label">Sertifikat GCP</label>
                        <input class="form-control form-control-lg" id="sertifikat_gcp" name="sertifikat_gcp" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="sertifikat_gcpError" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="laporan_penelitian" class="form-label">Laporan Penelitian</label>
                        <input class="form-control form-control-lg" id="laporan_penelitian" name="laporan_penelitian" type="file">
                        <small id="laporan_penelitianError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="raw_data_penelitian" class="form-label">Raw Data Penelitian</label>
                        <input class="form-control form-control-lg" id="raw_data_penelitian" name="raw_data_penelitian" type="file">
                        <small id="raw_data_penelitianError" class="text-danger"></small>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-sm btn-success float-end">Ajukan</button>
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
        $('#formsaya').submit(function(e) {
            e.preventDefault();
            let csrfToken = $('input[name="_token"]').val();

            let file      = new FormData($('#formsaya')[0]);
            // let deskripsi = tinymce.get('deskripsi').getContent()
            // file.append('deskripsi', deskripsi)

            $.ajax({
                type: 'POST',
                url: `{{url('/pengajuan-proposal/store')}}`,
                data: file,

                dataType: 'json',
                contentType: false,
                processData: false,
                headers: {
                    // 'X-HTTP-Method-Override': 'PATCH|DELETE', //only route patch and delete
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

                        let peneliti_utama      = data.errors.peneliti_utama
                        let tim_peneliti        = data.errors.tim_peneliti
                        let judul_penelitian    = data.errors.judul_penelitian
                        let surat_pengantar     = data.errors.surat_pengantar
                        let proposal_penelitian = data.errors.proposal_penelitian
                        let kaji_etik           = data.errors.kaji_etik
                        let sertifikat_gcp      = data.errors.sertifikat_gcp
                        let laporan_penelitian  = data.errors.laporan_penelitian
                        let raw_data_penelitian = data.errors.raw_data_penelitian
                                                
                        peneliti_utama      ? $('#peneliti_utamaError').html('<b>'+peneliti_utama+'</b>')           : $('#peneliti_utamaError').html('<b></b>') 
                        tim_peneliti        ? $('#tim_penelitiError').html('<b>'+tim_peneliti+'</b>')               : $('#tim_penelitiError').html('<b></b>') 
                        judul_penelitian    ? $('#judul_penelitianError').html('<b>'+judul_penelitian+'</b>')       : $('#judul_penelitianError').html('<b></b>') 
                        surat_pengantar     ? $('#surat_pengantarError').html('<b>'+surat_pengantar+'</b>')         : $('#surat_pengantarError').html('<b></b>') 
                        proposal_penelitian ? $('#proposal_penelitianError').html('<b>'+proposal_penelitian+'</b>') : $('#proposal_penelitianError').html('<b></b>') 
                        kaji_etik           ? $('#kaji_etikError').html('<b>'+kaji_etik+'</b>')                     : $('#kaji_etikError').html('<b></b>') 
                        sertifikat_gcp      ? $('#sertifikat_gcpError').html('<b>'+sertifikat_gcp+'</b>')           : $('#sertifikat_gcpError').html('<b></b>') 
                        laporan_penelitian  ? $('#laporan_penelitianError').html('<b>'+laporan_penelitian+'</b>')   : $('#laporan_penelitianError').html('<b></b>') 
                        raw_data_penelitian ? $('#raw_data_penelitianError').html('<b>'+raw_data_penelitian+'</b>') : $('#raw_data_penelitianError').html('<b></b>') 

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
