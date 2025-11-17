@php 
    $a = $proposal->PROPOSAL_TAHAPAN;
    $b = $proposal->PROPOSAL_STATUS;
@endphp 
<form id="formsaya" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-xxl-stretch p-5">
        <div class="card-header">
            <div class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark mb-2">Revisi Proposal Penelitian (#{{$proposal->PROPOSAL_KODE}})</span>

                <div class="alert alert-dismissible bg-light-danger border border-danger border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-5">
                    <i class="ki-duotone ki-message-text-2 fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    <!--end::Icon-->

                    <div class="d-flex flex-column pe-0 pe-sm-10">
                        <span class="text-dark mt-1 fw-bold fs-7">
                            <span class="fs-6">Informasi!</span> Dimohon untuk perbaiki data dengan teliti dan benar. Data hanya bisa diubah satu kali. Jika sudah klik tombol perbaiki maka data tidak bisa diubah.
                        </span>
                    </div>

                </div>
                
                <span class="proposal" hidden>{{$proposal->PROPOSAL_ID}}</span>
            </div>
        </div>
        <div class="card-body">
            {{-- <div class="row">
                <div class="col-sm-12 col-lg-7">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label required">Nama Peneliti utama</label>
                        <input type="text" id="peneliti_utama" name="peneliti_utama" value="{{$proposal->PROPOSAL_PENELITI_UTAMA}}" class="form-control mb-2" @if($b == 'Revisi Proposal')  @endif disabled>
                        <small id="peneliti_utamaError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-7">
                    
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label required">Anggota tim peneliti</label>
                        <textarea id="tim_peneliti" name="tim_peneliti" rows="4" class="form-control" @if($b == 'Revisi Proposal')  @endif disabled>{{$proposal->PROPOSAL_TIM_PENELITI}}</textarea>
                        <small id="tim_penelitiError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label required">Judul Penelitian</label>
                        <textarea id="judul_penelitian" name="judul_penelitian" rows="4" class="form-control" @if($b == 'Revisi Proposal')  @endif disabled>{{$proposal->PROPOSAL_JUDUL_PENELITIAN}}</textarea>
                        <small id="judul_penelitianError" class="text-danger"></small>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="surat_pengantar" class="form-label require">Surat Permohonan</label>
                        <input class="form-control form-control-lg" id="surat_pengantar" name="surat_pengantar" type="file" @if($b != 'Revisi Proposal') disabled @endif>
                        
                        <div class="d-flex justify-content-between">
                            <small><a href="{{asset('/storage/FILE_SURAT_PENGANTAR/'.$proposal->PROPOSAL_SURAT_PENGANTAR)}}" class="btn btn-link btn-sm" target="new">{{$proposal->PROPOSAL_SURAT_PENGANTAR}}</a></small>
                            <small id="surat_pengantarError" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="proposal_penelitian" class="form-label required ">Revisi Proposal Penelitian</label>
                        <input class="form-control form-control-lg" id="proposal_penelitian" name="proposal_penelitian" type="file" @if($b != 'Revisi Proposal') disabled @endif>
                        <div class="d-flex justify-content-between">
                            <small><a href="{{asset('/storage/FILE_PROPOSAL_PENELITIAN/'.$proposal->PROPOSAL_PROPOSAL_PENELITIAN)}}" class="btn btn-link btn-sm" target="new">{{$proposal->PROPOSAL_PROPOSAL_PENELITIAN}}</a></small>
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
                        <input class="form-control form-control-lg" id="kaji_etik" name="kaji_etik" type="file" @if($b != 'Revisi Proposal') disabled @endif >
                        <div class="d-flex justify-content-between">
                            <small><a href="{{asset('/storage/FILE_KAJI_ETIK/'.$proposal->PROPOSAL_KAJI_ETIK)}}" class="btn btn-link btn-sm" target="new">{{$proposal->PROPOSAL_KAJI_ETIK}}</a></small>
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
                        <input class="form-control form-control-lg" id="sertifikat_gcp" name="sertifikat_gcp" type="file" @if($b != 'Revisi Proposal') disabled @endif >
                        <div class="d-flex justify-content-between">
                            <small><a href="{{asset('/storage/FILE_SERTIFIKAT_GCP/'.$proposal->PROPOSAL_SERTIFIKAT_GCP)}}" class="btn btn-link btn-sm" target="new">{{$proposal->PROPOSAL_SERTIFIKAT_GCP}}</a></small>
                            <small id="sertifikat_gcpError" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($proposal->PROPOSAL_STATUS == 'Revisi Proposal') <button class="btn btn-sm btn-success float-end">Perbaiki</button> @endif
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
            let csrfToken    = $('input[name="_token"]').val();
            const idproposal = $('.proposal').text(); 
            let file         = new FormData($('#formsaya')[0]);
            // let deskripsi = tinymce.get('deskripsi').getContent()
            // file.append('deskripsi', deskripsi)

            $.ajax({
                type: 'POST',
                url: `{{url('/pengajuan-proposal/${idproposal}/update')}}`,
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
