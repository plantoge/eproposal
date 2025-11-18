<form id="formtahap2" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-xxl-stretch p-5">
        <div class="card-header">
            <div class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark mb-2">Kelengkapan Dokumen (#{{$proposal->proposal_kode}})</span>

                <div class="alert alert-dismissible bg-light-primary border border-primary border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-5">
                    <i class="ki-duotone ki-message-text-2 fs-2hx text-primary me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    <!--end::Icon-->

                    <div class="d-flex flex-column pe-0 pe-sm-10">
                        <span class="text-dark mt-1 fw-bold fs-7">
                            <span class="fs-6">Informasi!</span> Silahkan menghubungi CP untuk proses pembuatan dokumen dibawah ini. Jika dokumen sudah ada silahkan upload pada kolom terlampir.
                        </span>
                    </div>

                </div>
                
                <span class="proposaltahap2" hidden>{{$proposal->id}}</span>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="form-label"> CP: {{$informasi->cp_kaji_etik ?? '-'}} ({{$informasi->wa_kaji_etik ?? '-'}} WhatsApp Only)</label> <br>
                        <label for="file_kaji_etik_rspi" class="form-label bg-light-success required">
                            Kaji Etik (Ethical Clearance)
                        </label>
                        <input class="form-control form-control-lg" id="file_kaji_etik_rspi" name="file_kaji_etik_rspi" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="kajietikrspi_error" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                        @if($proposal->proposal_kaji_etik_rspi != NULL) 
                            <small>
                                <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$proposal->proposal_kaji_etik_rspi)}}" class="btn btn-link btn-sm">{{$proposal->proposal_kaji_etik_rspi}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="form-label"> CP: {{$informasi->cp_kerahasiaan ?? '-'}} ({{$informasi->wa_kerahasiaan ?? '-'}} WhatsApp Only)</label> <br>
                        <label for="sertifikat_gcp" class="form-label bg-light-success required">
                            Surat Pernyataan Kerahasiaan Data 
                        </label> <br>
                        <input class="form-control form-control-lg" id="file_kerahasiaan" name="file_kerahasiaan" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="kerahasiaan_error" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                        @if($proposal->proposal_kerahasiaan != NULL) 
                            <small>
                                <a href="{{Storage::url('FILE_KERAHASIAAN/'.$proposal->proposal_kerahasiaan)}}" class="btn btn-link btn-sm">{{$proposal->proposal_kerahasiaan}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="form-label"> CP: {{$informasi->cp_pks ?? '-'}} ({{$informasi->wa_pks ?? '-'}} WhatsApp Only)</label> <br>
                        <label for="file_pks" class="form-label bg-light-success">Perjanjian Kerjasama (PKS)</label>
                        <input class="form-control form-control-lg" id="file_pks" name="file_pks" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="pks_error" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                        @if($proposal->proposal_pks != NULL) 
                            <small>
                                <a href="{{Storage::url('FILE_PKS/'.$proposal->proposal_pks)}}" class="btn btn-link btn-sm">{{$proposal->proposal_pks}}</a>
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8 mb-3"> 
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="form-label"> CP: {{$informasi->cp_mta ?? '-'}} ({{$informasi->wa_mta ?? '-'}} WhatsApp Only)</label> <br>
                        <label for="file_mta" class="form-label bg-light-success">Material Transfer Agreement (MTA)</label>
                        <input class="form-control form-control-lg" id="file_mta" name="file_mta" type="file">
                        <div class="d-flex justify-content-between">
                            <small id="mta_error" class="text-danger"></small>
                            <small class="text-dark">pdf maks. 2MB</small>
                        </div>
                        @if($proposal->proposal_mta != NULL) 
                            <small>
                                <a href="{{Storage::url('FILE_MTA/'.$proposal->proposal_mta)}}" class="btn btn-link btn-sm">{{$proposal->proposal_mta}}</a>
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

@section('jsany')
<script>
     $(document).ready(function() {
        // $('#submitButton').on('click', function(e) {
        $('#formtahap2').submit(function(e) {
            e.preventDefault();
            let csrfTokenn    = $('input[name="_token"]').val();
            let idproposal = $('.proposaltahap2').text(); 
            let filee         = new FormData($('#formtahap2')[0]);
            // let deskripsi = tinymce.get('deskripsi').getContent()
            // filee.append('deskripsi', deskripsi)

            console.log(idproposal, 'tahap2');
            $.ajax({
                type: 'POST',
                url: `{{url('/pengajuan-proposal/${idproposal}/tahap-2')}}`,
                data: filee,

                dataType: 'json',
                contentType: false,
                processData: false,
                headers: {
                    'X-HTTP-Method-Override': 'PATCH', //only route patch and delete
                    'X-CSRF-TOKEN': csrfTokenn
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

                        let file_kaji_etik_rspi = data.errors.file_kaji_etik_rspi
                        let file_kerahasiaan    = data.errors.file_kerahasiaan
                        let file_pks            = data.errors.file_pks
                        let file_mta            = data.errors.file_mta
                                                
                        file_kaji_etik_rspi  ? $('#kajietikrspi_error').html('<b>'+file_kaji_etik_rspi+'</b>') : $('#kajietikrspi_error').html('<b></b>') 
                        file_kerahasiaan     ? $('#kerahasiaan_error').html('<b>'+file_kerahasiaan+'</b>')     : $('#kerahasiaan_error').html('<b></b>') 
                        file_pks             ? $('#pks_error').html('<b>'+file_pks+'</b>')                     : $('#pks_error').html('<b></b>') 
                        file_mta             ? $('#mta_error').html('<b>'+file_mta+'</b>')                     : $('#mta_error').html('<b></b>') 

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
