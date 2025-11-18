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
        50% { opacity: 0.1; }
        100% { opacity: 1; }
    }

    .blinking {
        animation: blink 1s infinite;
    }
    
</style>
@endsection

@section('konten')

    @if ($totaldata == 0)
        @include('module/admin/VI_pengajuan_proposal/halamankosong')
    @else       

        @foreach ($pengajuanpenelitian as $data)
            
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-5">
                    <div class="card card-dashe">
                        <div class="card-header" style="background-color: #00B9AD !important;">
                            <h3 
                                class="card-title text-white @if($data->proposal_surat_penolakan != null) text-decoration-line-through @endif"
                                >#{{$data->proposal_kode}}/{{\Carbon\Carbon::parse($data->created_at)->format('y')}}
                            </h3>
                            
                            <div class="card-toolbar">
                                @if($data->proposal_tahapan)
                                    {{-- <a 
                                        class="btn btn-sm btn-warning text-dark me-3 @if($data->proposal_status == 'Revisi Proposal') blinking @endif"
                                        href="{{url('pengajuan-proposal/progress/'.$data->proposal_id)}}">
                                        Klik Tahap {{$data->proposal_tahapan}}
                                    </a> --}}
                                @endif
                                <button 
                                    @if($data->proposal_status != '-') hidden @endif
                                    class="btn btn-sm btn-danger text-white btn-delete-pengajuan" 
                                    data-pengajuan="{{$data->proposal_id}}">
                                    Batal
                                </button>

                            </div>
                        </div>
                        <div class="card-body">

                            {{-- informasi -------------------------------------------------------------------------------------------- --}}
                            @if($data->proposal_tahapan == '1')
                                @if($data->proposal_status == 'Penjadwalan Presentasi')
                                    
                                    @if($data->proposal_tanggal_presentasi == NULL && $data->proposal_kategori_presentasi == NULL && $data->proposal_media_presentasi == NULL)
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Informasi!</strong> Menunggu jadwal presentasi dari admin
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @else 
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Informasi!</strong> 
                                            Jadwal Presentasi pada {{\Carbon\Carbon::parse($data->proposal_tanggal_presentasi)->format('d/m/Y H:i')}} secara {{$data->proposal_kategori_presentasi}} @if($data->proposal_kategori_presentasi == 'Daring') <a href="{{$data->proposal_media_presentasi}}" class="btn btn-link btn-sm" target="_blank">Klik disini</a> @else di {{$data->proposal_media_presentasi}} @endif
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    
                                @elseif($data->proposal_status == 'Revisi Proposal')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 1</b> untuk upload revisi proposal
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            @elseif($data->proposal_tahapan == '2')
                                
                                @if($data->proposal_status == 'Kelengkapan Dokumen')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 2</b> untuk melengkapi dokumen
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @elseif($data->proposal_status == 'Verifikasi Dokumen')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Verifikasi Dokumen <b>Tahap 2</b>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif 
                            @elseif($data->proposal_tahapan == '3')
                                @if($data->proposal_status == 'Administrasi')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 3</b> untuk proses <b>Administrasi</b>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif 
                            @elseif($data->proposal_tahapan == '4')
                                
                                @if($data->proposal_status == 'Pelaksanaan Penelitian')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 4</b> untuk informasi terbaru Pelaksanaan Penelitian
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                            @elseif($data->proposal_tahapan == '5')
                                
                                @if($data->proposal_laporan_penelitian == null || $data->proposal_raw_data_penelitian == null)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Info!</strong> Silahkan upload Laporan penelitian dan raw data untuk mendapatkan surat izin resmi dari rspi
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                
                            @endif
                            {{-- endinformasi------------------------------------------------------------------------------------------- --}}

                            <ol class="list-group list-group-numbered mb-5">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Peneliti</div>
                                        {{$data->proposal_peneliti_utama}}
                                    </div>
                                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Judul Penelitian</div>
                                        {{$data->proposal_judul_penelitian}}
                                    </div>
                                </li>
                            </ol>

                            <div class="table-responsive">
                                <table class="table table-sm text-center align-midle nowrap">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            
                                            @if($data->proposal_surat_penolakan != null)
                                            <th>Surat Penolakan</th>
                                            @endif
                                            <th>Surat Permohonan</th>
                                            <th>Proposal Penelitian</th>
                                            <th>Kaji Etik</th>
                                            <th>Pernyataan Kerahasiaan</th>
                                            <th>Sertifikat GCP</th>

                                            <th>Kaji Etik RSPI</th>
                                            <th>PKS</th>
                                            <th>MTA</th>
                                            @if($data->proposal_izin_penelitian_draft != null)
                                            <th>Surat Izin Penelitian (Draft)</th>
                                            @endif
                                            @if($data->proposal_izin_penelitian != null)
                                            <th>Surat Izin Penelitian</th>
                                            @endif
                                            {{-- <th>Bukti Bayar</th> --}}
                                            <th>Laporan Penelitian</th>
                                            <th>Raw Data Penelitian</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            
                                            @if($data->proposal_surat_penolakan != null)
                                            <td>
                                                <a href="{{Storage::url('FILE_SURAT_PENOLAKAN/'.$data->proposal_surat_penolakan)}}" target="_blank" class="btn btn-link text-danger btn-sm blinking">Lihat</a>
                                            </td>
                                            @endif
                                            <td>
                                                @if($data->proposal_surat_pengantar)
                                                <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->proposal_surat_pengantar)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->proposal_proposal_penelitian)
                                                    <button 
                                                        class="w-100 btn btn-link btn-sm btn-history-file" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalproposal" 
                                                        data-pengajuan="{{$data->proposal_id}}">
                                                        Lihat
                                                    </button>

                                                    {{-- <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->proposal_proposal_penelitian)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a> --}}
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->proposal_kaji_etik)
                                                <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->proposal_kaji_etik)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
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
                                                <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->proposal_sertifikat_gcp)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->proposal_kaji_etik_rspi)
                                                <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$data->proposal_kaji_etik_rspi)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->proposal_pks)
                                                <a href="{{Storage::url('FILE_PKS/'.$data->proposal_pks)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->proposal_mta)
                                                <a href="{{Storage::url('FILE_MTA/'.$data->proposal_mta)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td>
                                            @if($data->proposal_izin_penelitian_draft != null)
                                            <td>
                                                <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$data->proposal_izin_penelitian_draft)}}" target="_blank" class="btn btn-link text-danger btn-sm blinking">Lihat</a>
                                            </td>
                                            @endif
                                            @if($data->proposal_izin_penelitian != null)
                                            <td>
                                                <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->proposal_izin_penelitian)}}" target="_blank" class="btn btn-link text-danger btn-sm blinking">Lihat</a>
                                            </td>
                                            @endif
                                            {{-- <td>
                                                @if($data->proposal_bukti_bayar)
                                                <a href="{{Storage::url('FILE_BUKTI_BAYAR/'.$data->proposal_bukti_bayar)}}" target="_blank" class="btn btn-link btn-sm">bukti bayar</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td> --}}
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
                                        </tr>
                                        </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer" style="padding: 0.5rem !important;">
                            <div class="row">

                                <div class="col-sm-6 col-lg-6">
                                    <span class="float-lg-start fw-bold">Pengajuan proposal: {{\Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i:s')}}</span>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <span class="float-lg-end fw-bold">
                                        @if($data->proposal_status == '-')
                                            Status: <span class="badge badge-danger blinking">Menunggu</span>
                                        @else
                                            Status: <span class="badge badge-success blinkin">{{$data->proposal_status}}</span>
                                        @endif 
                                    </span>
                                </div>

                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        {{ $pengajuanpenelitian->links() }}


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
    </script>

    <script>
        $(document).ready(function() {
            
            $('.btn-delete-pengajuan').on('click', function(){
                Swal.fire({
                    title: "Apakah Yakin ?",
                    text: "Data tidak bisa di kembalikan lagi jika di batalkan",
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
                            url: `{{url('/pengajuan-proposal/delete')}}`,
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

                    }
                });

            })


        })
    </script>
@endsection