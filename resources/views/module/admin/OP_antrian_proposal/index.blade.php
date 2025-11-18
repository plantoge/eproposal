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
            <span class="card-label fw-bolder text-dark">Antrian Pengajuan Penelitian</span>
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
                                <th>Tahap</th>
                                <th>Status</th>
                                <th>Peneliti Utama</th>
                                <th>Email</th>
                                <th>WA/HP</th>
                                <th>Institusi Asal</th>
                                <th>Tim Peneliti</th>
                                <th>Judul Penelitian</th>
                                <th>Surat Pengantar</th>
                                <th>Proposal Penelitian</th>
                                <th>Kaji Etik</th>
                                <th>Pernyataan Kerahasiaan</th>
                                <th>Sertifikat GCP</th>
                                <th>Kaji Etik RSPI</th>
                                <th>PKS</th>
                                <th>MTA</th>
                                <th>Surat Penolakan</th>
                                <th>Bukti Bayar</th>
                                <th>Izin Penelitian Draft</th>
                                <th>Laporan Penelitian</th>
                                <th>Raw Data Penelitian</th>
                                <th>Izin Penelitian Resmi</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuanpenelitian as $data)
                                
                            <tr class="align-middle border-secondary border-bottom">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{url('/antrian-proposal/'.$data->id)}}" class="btn btn-sm btn-secondary w-100">Detail</a> <br>
                                    <button class="w-100 btn btn-sm btn-danger text-white btn-delete-pengajuan disabled" hidden data-pengajuan="{{$data->id}}">
                                        Batalkan
                                    </button>
                                    <button 
                                        class="w-100 btn btn-sm btn-primary modalstatus" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalstatus" 
                                        data-pengajuan="{{$data->id}}"
                                        data-status="{{$data->proposal_status}}">
                                        Status
                                    </button>
                                    <br>
                                    
                                    @if($data->proposal_status == 'Penjadwalan Presentasi' )
                                    <button 
                                        class="w-100 btn btn-sm btn-warning text-dark modaltanggapan" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modaltanggapan" 
                                        data-pengajuan="{{$data->id}}">
                                        Tanggapan
                                    </button>
                                    <br>
                                    <button 
                                        class="w-100 btn btn-sm btn-info text-white modaljadwal" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modaljadwal" 
                                        data-tanggal_presentasi="{{$data->proposal_tanggal_presentasi}}"
                                        data-kategori_presentasi="{{$data->proposal_kategori_presentasi}}"
                                        data-media_presentasi="{{$data->proposal_media_presentasi}}"
                                        data-pengajuan="{{$data->id}}">
                                        Jadwal Presentasi
                                    </button>
                                    <br>
                                    @endif
                                    @if($data->proposal_status == 'Verifikasi dan Menunggu Draft Izin Penelitian' || $data->proposal_status == 'Verifikasi Akhir' )
                                    <button 
                                        class="w-100 btn btn-sm btn-success modalizin" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalizin" 
                                        data-keyizin="{{$data->id}}">
                                        Izin Penelitian
                                    </button>
                                    @endif
                                    @if($data->proposal_tahapan == 1 || $data->proposal_tahapan == 2 )
                                    <button 
                                        class="w-100 btn btn-sm btn-danger modaltolak" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modaltolak" 
                                        data-pengajuan="{{$data->id}}">
                                        Tolak
                                    </button>
                                    <br>
                                    @endif
                                </td>
                                <td>#{{$data->proposal_kode}}</td>
                                <td class="text-center">{{$data->proposal_tahapan}}</td>
                                <td>
                                    @if($data->proposal_status)
                                        {{$data->proposal_status}}
                                    @else
                                        Belum Input
                                    @endif
                                </td>
                                <td>{{$data->proposal_peneliti_utama}}</td>
                                <td>{{$data->proposal_email}}</td>
                                <td>{{$data->proposal_phone}}</td>
                                <td>{{$data->proposal_institusi_asal}}</td>
                                <td>
                                    <span class="text-break">
                                        {{$data->proposal_tim_peneliti}}
                                    </span>
                                </td>
                                <td>{{$data->proposal_judul_penelitian}}</td>
                                <td>
                                    @if($data->proposal_surat_pengantar)
                                    <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->proposal_surat_pengantar)}}" target="_blank" class="btn btn-link btn-sm text-danger">surat pengantar</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_proposal_penelitian)
                                    <button 
                                        class="w-100 btn btn-link btn-sm btn-history-file" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalproposal" 
                                        data-pengajuan="{{$data->id}}">
                                        Lihat
                                    </button>
                                    {{-- <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->proposal_proposal_penelitian)}}" target="_blank" class="btn btn-link btn-sm text-danger">proposal penelitian</a> --}}
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_kaji_etik)
                                    <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->proposal_kaji_etik)}}" target="_blank" class="btn btn-link btn-sm text-danger">kaji etik</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_kerahasiaan)
                                    <a href="{{Storage::url('FILE_KERAHASIAAN/'.$data->proposal_kerahasiaan)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm disabled">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_sertifikat_gcp)
                                    <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->proposal_sertifikat_gcp)}}" target="_blank" class="btn btn-link btn-sm text-danger">gcp</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_kaji_etik_rspi)
                                    <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$data->proposal_kaji_etik_rspi)}}" target="_blank" class="btn btn-link btn-sm text-danger">kaji etik rspi</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_pks)
                                    <a href="{{Storage::url('FILE_PKS/'.$data->proposal_pks)}}" target="_blank" class="btn btn-link btn-sm text-danger">pks</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_mta)
                                    <a href="{{Storage::url('FILE_MTA/'.$data->proposal_mta)}}" target="_blank" class="btn btn-link btn-sm text-danger">mta</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_surat_penolakan)
                                    <a href="{{Storage::url('FILE_SURAT_PENOLAKAN/'.$data->proposal_surat_penolakan)}}" target="_blank" class="btn btn-link btn-sm text-danger">penolakan</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_bukti_bayar)
                                    <a href="{{Storage::url('FILE_BUKTI_BAYAR/'.$data->proposal_bukti_bayar)}}" target="_blank" class="btn btn-link btn-sm text-danger">bukti bayar</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_izin_penelitian_draft)
                                    <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$data->proposal_izin_penelitian_draft)}}" target="_blank" class="btn btn-link btn-sm text-danger">Draft Izin Penelitian</a>
                                    @else
                                        <button class="btn btn-link btn-sm disabled">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_laporan_penelitian)
                                    <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->proposal_laporan_penelitian)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm disabled">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_raw_data_penelitian)
                                    <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->proposal_raw_data_penelitian)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                    @else
                                        <button class="btn btn-link btn-sm disabled">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_izin_penelitian)
                                    <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->proposal_izin_penelitian)}}" target="_blank" class="btn btn-link btn-sm text-danger">Izin Penelitian</a>
                                    @else
                                        <button class="btn btn-link btn-sm disabled">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s')}}
                                </td>
        
                            </tr>
        
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Aksi</th>
                                <th>Kode</th>
                                <th>Tahap</th>
                                <th>Status</th>
                                <th>Peneliti Utama</th>
                                <th>Email</th>
                                <th>WA/HP</th>
                                <th>Institusi Asal</th>
                                <th>Tim Peneliti</th>
                                <th>Judul Penelitian</th>
                                <th>Surat Pengantar</th>
                                <th>Proposal Penelitian</th>
                                <th>Kaji Etik</th>
                                <th>Sertifikat GCP</th>
                                <th>Kaji Etik RSPI</th>
                                <th>PKS</th>
                                <th>MTA</th>
                                <th>Surat Penolakan</th>
                                <th>Bukti Bayar</th>
                                <th>Izin Penelitian Draft</th>
                                <th>Laporan Penelitian</th>
                                <th>Raw Data Penelitian</th>
                                <th>Izin Penelitian Resmi</th>
                                <th>Dibuat</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalstatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="formstatus" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Status Berkas</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <select class="form-select form-select-soli" id="status" name="status">
                        <option>Pilih status..</option>
                        <option value="Verifikasi">Verifikasi (1)</option>
                        <option value="Review Proposal">Review Proposal</option>
                        <option value="Penjadwalan Presentasi">Penjadwalan Presentasi</option>
                        <option value="Revisi Proposal">Revisi Proposal</option>
                        <option value="Verifikasi Revisi Proposal" disabled>Verifikasi Revisi Proposal</option>
                        <option value="Kelengkapan Dokumen">Kelengkapan Dokumen (2)</option>
                        <option value="Verifikasi Dokumen" disabled>Verifikasi Dokumen</option>
                        <option value="Administrasi">Administrasi (3)</option>
                        <option value="Verifikasi dan Menunggu Draft Izin Penelitian" disabled>Verifikasi dan Menunggu Draft Izin Penelitian</option>
                        <option value="Pelaksanaan Penelitian">Pelaksanaan Penelitian (4)</option>
                        <option value="Dokumen Akhir">Dokumen Akhir (5)</option>
                        <option value="Verifikasi Akhir" disabled>Verifikasi Akhir</option>
                        <option value="Penelitian Selesai">Penelitian Selesai</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modaltolak">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formtolak" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Proses data ditolak</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="suratpenolakan" class="form-label required">Upload Surat</label>
                        <input class="form-control form-control-lg" id="suratpenolakan" name="suratpenolakan" type="file">
                        <input type="text" value="" id="pengajuann" name="pengajuann" hidden>
                        <small id="suratpenolakanError" class="text-danger"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <a id="batalkanpenolakan" class="btn btn-info" onclick="return confirm('Yakin batalkan Penolakan ini ?')">Batalkan</a>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modaltanggapan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formrevisi" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Lampiran Surat Tanggapan</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="surattanggapan" class="form-label required">Upload Surat</label>
                        <input class="form-control form-control-lg" id="surattanggapan" name="surattanggapan" type="file">
                        <input type="text" value="" id="pengajuannn" name="pengajuann" hidden>
                        <small id="surattanggapanError" class="text-danger"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <a id="batalkanpenolakan" class="btn btn-info" onclick="return confirm('Yakin batalkan Penolakan ini ?')">Batalkan</a>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalizin">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formizin" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Sertakan Surat Izin Penelitian</h5>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="suratizin" class="form-label required">Upload Surat</label>
                        <input class="form-control form-control-lg" id="suratizin" name="suratizin" type="file">
                        <input type="text" value="" id="keyizin" name="keyizin" hidden>
                        <small id="suratizinError" class="text-danger"></small>
                    </div>
                    <small>catatan: Jika status nya 'Pelaksanaan Penelitian' otomatis akan tersimpan ke draft surat. jika status nya 'Dokumen Akhir' otomatis akan tersimpan ke surat asli izin penelitian</small>
                    {{-- <div class="form-check form-check-custom form-check-solid mb-3">
                        <input class="form-check-input" type="radio" value="draft" id="draft" name="jenis_izin" checked />
                        <label class="form-check-label form-label" for="draft">
                            Draft Surat
                        </label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="radio" value="asli" id="asli" name="jenis_izin"/>
                        <label class="form-check-label form-label" for="asli">
                            Surat Asli
                        </label>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <a id="batalkanizin" class="btn btn-info" onclick="return confirm('Yakin batalkan perizinan ini ?')">Batalkan</a>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modaljadwal" data-bs-focus="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formjadwal" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Jadwal Presentasi</h5>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="tanggal_presentasi" class="form-label required">Jadwal Presentasi</label>
                        <input type="text" value="" id="tanggal_presentasi" name="tanggal_presentasi" class="form-control">
                        <input type="text" value="" id="pengajuan_jadwal" name="pengajuan_jadwal" hidden>
                        <small id="tanggal_presentasi_error" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="kategori_acara" class="form-label required">Kategori Acara</label>
                        <select id="kategori_acara" class="form-control" name="kategori_acara">
                            <option value="Luring">Luring</option>
                            <option value="Daring">Daring</option>
                        </select>
                        <small id="kategori_acara_error" class="text-danger"></small>
                    </div>
                    <div class="mb-5 fv-row fv-plugins-icon-container">
                        <label for="media_presentasi" class="form-label required">Url Daring / Lokasi Luring</label>
                        <textarea name="media_presentasi" id="media_presentasi" cols="30" rows="5" class="form-control"></textarea>
                        <small id="media_presentasi_error" class="text-danger"></small>
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

<div class="modal fade" tabindex="-1" id="modalproposal" data-bs-focus="false">
    <div class="modal-dialog">
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">File Proposal</h5>

                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
            </div>

            <div class="modal-body">
                <div class="looping-list-file">

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
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
            fixedHeader: true,
        });

        $("#tanggal_presentasi").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i:s",
        });
    </script>
    
    <script>
        $(document).ready(function() {

            $('.btn-history-file').on('click', function(){
                let pengajuan = $(this).data('pengajuan');

                console.log(pengajuan);
                $.ajax({
                    type: 'GET',
                    url: `{{url('/gethistory-proposal')}}`,
                    data: { pengajuan: pengajuan },
                    // dataType: 'json',
                    // contentType: false,
                    // processData: false,
                    // headers: {
                    //     'X-HTTP-Method-Override': 'DELETE', //only route patch and delete
                    //     'X-CSRF-TOKEN': csrfToken
                    // },
                    // beforeSend: function() {
                    //     swal.fire({
                    //     title: 'Mohon Tunggu!',
                    //     html: 'Sedang proses data ke server',
                    //     didOpen: () => {
                    //         swal.showLoading()
                    //     }
                    //     })
                    // },
                    success:function(data){
                        $(".looping-list-file").html(data);
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
            
            $('.btn-delete-pengajuan').on('click', function(){
                Swal.fire({
                    title: "Apakah Yakin ?",
                    text: "Data tidak bisa di kembalikan lagi jika di hapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya hapus",
                    cancelButtonText: "Gak Jadi",
                }).then((result) => {

                    if (result.isConfirmed) {
                        let csrfToken = $('meta[name="csrf-token"]').attr('content');
                        let pengajuan = $(this).data('pengajuan');

                        $.ajax({
                            type: 'POST',
                            url: `{{url('/pengajuan-saya/delete/')}}`,
                            data: { pengajuan: pengajuan },
                            dataType: 'json',
                            // contentType: false,
                            // processData: false,
                            headers: {
                                'X-HTTP-Method-Override': 'DELETE', //only route patch and delete
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
                                
                                if(data.status_code == 404){
                                    Swal.fire({
                                        text: data.message,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    })
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
                                            window.location.href = `{{url('pengajuan-penelitian')}}`;
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

                    }
                });

            })

            $('#formtolak').submit(function(e) {
                e.preventDefault();
                let csrfToken = $('input[name="_token"]').val();
                let file      = new FormData($('#formtolak')[0]);
                // let deskripsi = tinymce.get('deskripsi').getContent()
                // file.append('deskripsi', deskripsi)

                $.ajax({
                    type: 'POST',
                    url: `{{url('antrian-proposal/tolak')}}`,
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

                            let suratpenolakan      = data.errors.suratpenolakan
                                                    
                            suratpenolakan      ? $('#suratpenolakanError').html('<b>'+suratpenolakan+'</b>')           : $('#suratpenolakanError').html('<b></b>') 

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
                                    window.location.href = `{{url('antrian-proposal')}}`;
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

            $('#formrevisi').submit(function(e) {
                e.preventDefault();
                let csrfToken = $('input[name="_token"]').val();
                let file      = new FormData($('#formrevisi')[0]);
                // let deskripsi = tinymce.get('deskripsi').getContent()
                // file.append('deskripsi', deskripsi)

                $.ajax({
                    type: 'POST',
                    url: `{{url('antrian-proposal/tanggapan-revisi')}}`,
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

                            let surattanggapan = data.errors.surattanggapan
                                                    
                            surattanggapan ? $('#surattanggapanError').html('<b>'+surattanggapan+'</b>') : $('#surattanggapanError').html('<b></b>') 

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
                                    window.location.href = `{{url('antrian-proposal')}}`;
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

            $('#formizin').submit(function(e) {
                e.preventDefault();
                let csrfToken = $('input[name="_token"]').val();
                let file      = new FormData($('#formizin')[0]);
                // let deskripsi = tinymce.get('deskripsi').getContent()
                // file.append('deskripsi', deskripsi)

                $.ajax({
                    type: 'POST',
                    url: `{{url('antrian-proposal/izin')}}`,
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

                            let suratizin = data.errors.suratizin
                                                    
                            suratizin ? $('#suratizinError').html('<b>'+suratizin+'</b>') : $('#suratizinError').html('<b></b>')  

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
                                    window.location.href = `{{url('antrian-proposal')}}`;
                                }
                            });
                        }      
                    },
                    error: function(xhr, status, error) {
                        swal.close() 
                        // console.log(status)
                        // console.log(error)

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

            $('#formjadwal').submit(function(e) {
                e.preventDefault();
                let csrfToken = $('input[name="_token"]').val();
                let file      = new FormData($('#formjadwal')[0]);
                // let deskripsi = tinymce.get('deskripsi').getContent()
                // file.append('deskripsi', deskripsi)

                $.ajax({
                    type: 'POST',
                    url: `{{url('antrian-proposal/jadwal-presentasi')}}`,
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

                            let tanggal_presentasi = data.errors.tanggal_presentasi
                            let kategori_acara = data.errors.kategori_acara
                            let media_presentasi = data.errors.media_presentasi
                                                    
                            tanggal_presentasi  ? $('#tanggal_presentasi_error').html('<b>'+tanggal_presentasi+'</b>') : $('#tanggal_presentasi_error').html('<b></b>')  
                            kategori_acara      ? $('#kategori_acara_error').html('<b>'+kategori_acara+'</b>')         : $('#kategori_acara_error').html('<b></b>')  
                            media_presentasi    ? $('#media_presentasi_error').html('<b>'+media_presentasi+'</b>')     : $('#media_presentasi_error').html('<b></b>')  

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
                                    window.location.href = `{{url('antrian-proposal')}}`;
                                }
                            });
                        }      
                    },
                    error: function(xhr, status, error) {
                        swal.close() 
                        // console.log(status)
                        // console.log(error)

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

            $('.modalstatus').on('click', function(){
                let pengajuan = $(this).data('pengajuan');
                let status = $(this).data('status');

                $('#status').val(status);
                $('.formstatus').attr('action',`{{url('/antrian-proposal/${pengajuan}/update')}}`);
            })
            
            $('.modaltolak').on('click', function(){
                let pengajuan = $(this).data('pengajuan');
                $('#pengajuann').val(pengajuan);
                
                $('#batalkanpenolakan').attr('href',`{{url('/antrian-proposal/${pengajuan}/batalkan-penolakan')}}`);

            })

            $('.modaltanggapan').on('click', function(){
                let pengajuan = $(this).data('pengajuan');
                $('#pengajuannn').val(pengajuan);
                
                $('#batalkanpenolakan').attr('href',`{{url('/antrian-proposal/${pengajuan}/batalkan-penolakan')}}`);

            })

            $('.modalizin').on('click', function(){
                let keyizin = $(this).data('keyizin');
                
                $('#keyizin').val(keyizin);
                
                $('#batalkanizin').attr('href',`{{url('/antrian-proposal/${keyizin}/batalkan-perizinan')}}`);

            })

            $('.modaljadwal').on('click', function(){
                let pengajuan = $(this).data('pengajuan');
                let tanggal_presentasi = $(this).data('tanggal_presentasi');
                let kategori_presentasi = $(this).data('kategori_presentasi');
                let media_presentasi = $(this).data('media_presentasi');

                $('#pengajuan_jadwal').val(pengajuan);
                $('#tanggal_presentasi').val(tanggal_presentasi);
                $('#kategori_acara').val(kategori_presentasi);
                $('#media_presentasi').val(media_presentasi);
                
                // $('#batalkanizin').attr('href',`{{url('/antrian-proposal/${pengajuan}/batalkan-perizinan')}}`);
            })
            
        })
    </script>
@endsection