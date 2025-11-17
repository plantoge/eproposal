@extends('layout.panel.masterPanel')

@section('css')

@endsection

@section('konten')
<div class="card card-pag mb-5 p-0">
    <div class="card-body">
        <h1>Welcome, {{auth()->user()->name}}</h1>
    </div>
</div>
@endsection

@if(auth()->user()->roles->contains('name', 'operator'))
@section('konten2')
<div class="card card-pag mb-3">
    <div class="card-body">
        
        <form id="formsaya" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <h2 class="pb-5">Data Informasi Website</h2>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Email</label>
                        <input type="text" id="email" name="email" value="{{$informasi->EMAIL}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Facebook</label>
                        <input type="text" id="facebook" name="facebook" value="{{$informasi->FACEBOOK}}" class="form-control mb-2" placeholder="">
                        <small id="facebookError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Instagram</label>
                        <input type="text" id="instagram" name="instagram" value="{{$informasi->INSTAGRAM}}" class="form-control mb-2" placeholder="">
                        <small id="instagramError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Twitter</label>
                        <input type="text" id="twitter" name="twitter" value="{{$informasi->TWITTER}}" class="form-control mb-2" placeholder="">
                        <small id="twitterError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{$informasi->WHATSAPP}}" class="form-control mb-2" placeholder="ex: 0812345678">
                        <small id="whatsappError" class="text-danger"></small>
                    </div>
                    
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Telepon</label>
                        <input type="text" id="telepon" name="telepon" value="{{$informasi->TELEPON}}" class="form-control mb-2" placeholder="">
                        <small id="teleponError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Fax</label>
                        <input type="text" id="fax" name="fax" value="{{$informasi->FAX}}" class="form-control mb-2" placeholder="">
                        <small id="faxError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Call Center</label>
                        <input type="text" id="callcenter" name="callcenter" value="{{$informasi->CALLCENTER}}" class="form-control mb-2" placeholder="">
                        <small id="callcenterError" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Hotline</label>
                        <input type="text" id="hotline" name="hotline" value="{{$informasi->HOTLINE}}" class="form-control mb-2" placeholder="">
                        <small id="hotlineError" class="text-danger"></small>
                    </div>
                    
                    
                </div>
            </div>
            <hr>    
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Contact person kaji etik</label>
                        <input type="text" id="cp_kaji_etik" name="cp_kaji_etik" value="{{$informasi->CP_KAJI_ETIK}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Whatsapp kaji etik</label>
                        <input type="text" id="wa_kaji_etik" name="wa_kaji_etik" value="{{$informasi->WA_KAJI_ETIK}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Contact person PKS</label>
                        <input type="text" id="cp_pks" name="cp_pks" value="{{$informasi->CP_PKS}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Whatsapp PKS</label>
                        <input type="text" id="wa_pks" name="wa_pks" value="{{$informasi->WA_PKS}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Contact person MTA</label>
                        <input type="text" id="cp_mta" name="cp_mta" value="{{$informasi->CP_MTA}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Whatsapp MTA</label>
                        <input type="text" id="wa_mta" name="wa_mta" value="{{$informasi->WA_MTA}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Contact person Pernyataan Kerahasiaan Data</label>
                        <input type="text" id="cp_kerahasiaan" name="cp_kerahasiaan" value="{{$informasi->CP_KERAHASIAAN}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Whatsapp Pernyataan Kerahasiaan Data</label>
                        <input type="text" id="wa_kerahasiaan" name="wa_kerahasiaan" value="{{$informasi->WA_KERAHASIAAN}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
            </div>

            <hr> 

            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Pemilik Rekening</label>
                        <input type="text" id="pemilik_rekening" name="pemilik_rekening" value="{{$informasi->PEMILIK_REKENING}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Nomor Rekening</label>
                        <input type="text" id="nomor_rekening" name="nomor_rekening" value="{{$informasi->NOMOR_REKENING}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Nama Bank</label>
                        <input type="text" id="nama_bank" name="nama_bank" value="{{$informasi->NAMA_BANK}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div>
                {{-- <div class="col-sm-12 col-lg-6">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label class="required form-label">Logo Bank</label>
                        <input type="text" id="logo_bank" name="logo_bank" value="{{$informasi->NOMOR_REKENING}}" class="form-control mb-2" placeholder="">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                </div> --}}
            </div>

            <h2 class="pb-5 pt-5">Deskripsi Informasi Biaya</h2>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        {{-- <label class="form-label">Deskripsi</label> --}}
                        <textarea id="deskripsi_biaya" name="deskripsi_biaya" class="tox-target">
                            {!! $informasi->DESKRIPSI_BIAYA !!}
                        </textarea>
                        <small id="deskripsi_biaya_error" class="text-danger"></small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-sm-12 col-lg-12">
                    <button class="btn btn-primary btn-sm">UPDATE</button>
                </div>
                
            </div>
        </form>

    </div>
</div>
@endsection
@endif

@section('js')
<script src="{{url('/Twebsite/v1/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script>
    tinymce.init({
        selector: "#deskripsi_biaya",
        branding: false,
        toolbar: [
            "styleselect fontselect fontsizeselect | undo redo | cut copy paste | table | bold italic | link | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview | code |"  // Menambahkan opsi tabel ke dalam toolbar
        ],
        plugins: "advlist autolink link lists charmap print preview code table" 
    });

</script>

<script>
    $(document).ready(function(){
        $('#formsaya').submit(function(e){
            e.preventDefault();

            let csrfToken           = $('input[name="_token"]').val();
            let file                = new FormData($('#formsaya')[0]);
            // let sambutan_beranda    = tinymce.get('sambutan_beranda').getContent()
            // let deskripsi_agenda    = tinymce.get('deskripsi_agenda').getContent()
            // let deskripsi_tentangkami    = tinymce.get('deskripsi_tentangkami').getContent()
            // file.append('sambutan_beranda', sambutan_beranda)
            // file.append('deskripsi_agenda', deskripsi_agenda)
            // file.append('deskripsi_tentangkami', deskripsi_tentangkami)

            $.ajax({
                type: 'POST',
                url: `{{url('/panel-informasi/store')}}`,
                data: file,

                dataType: 'json',
                contentType: false,
                processData: false,
                headers: {
                    'X-HTTP-Method-Override': 'PATCH',
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
                    console.log(data);    
                    
                    if(data.status_code == 422){
                        let title = data.errors.title
                        
                        title    ? $('#titleError').html('<b>'+title+'</b>') : $('#titleError').html('<b></b>') 

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
                                window.location.href = `{{url('panel')}}`;
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
        })
    })
</script>
@endsection