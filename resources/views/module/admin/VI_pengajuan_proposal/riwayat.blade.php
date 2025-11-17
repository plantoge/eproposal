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
                                class="card-title text-white @if($data->PROPOSAL_SURAT_PENOLAKAN != null) text-decoration-line-through @endif"
                                >#{{$data->PROPOSAL_KODE}}/{{\Carbon\Carbon::parse($data->created_at)->format('y')}}
                            </h3>
                            
                            <div class="card-toolbar">
                                @if($data->PROPOSAL_TAHAPAN)
                                    {{-- <a 
                                        class="btn btn-sm btn-warning text-dark me-3 @if($data->PROPOSAL_STATUS == 'Revisi Proposal') blinking @endif"
                                        href="{{url('pengajuan-proposal/progress/'.$data->PROPOSAL_ID)}}">
                                        Klik Tahap {{$data->PROPOSAL_TAHAPAN}}
                                    </a> --}}
                                @endif
                                <button 
                                    @if($data->PROPOSAL_STATUS != '-') hidden @endif
                                    class="btn btn-sm btn-danger text-white btn-delete-pengajuan" 
                                    data-pengajuan="{{$data->PROPOSAL_ID}}">
                                    Batal
                                </button>

                            </div>
                        </div>
                        <div class="card-body">

                            {{-- informasi -------------------------------------------------------------------------------------------- --}}
                            @if($data->PROPOSAL_TAHAPAN == '1')
                                @if($data->PROPOSAL_STATUS == 'Penjadwalan Presentasi')
                                    
                                    @if($data->PROPOSAL_TANGGAL_PRESENTASI == NULL && $data->PROPOSAL_KATEGORI_PRESENTASI == NULL && $data->PROPOSAL_MEDIA_PRESENTASI == NULL)
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Informasi!</strong> Menunggu jadwal presentasi dari admin
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @else 
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Informasi!</strong> 
                                            Jadwal Presentasi pada {{\Carbon\Carbon::parse($data->PROPOSAL_TANGGAL_PRESENTASI)->format('d/m/Y H:i')}} secara {{$data->PROPOSAL_KATEGORI_PRESENTASI}} @if($data->PROPOSAL_KATEGORI_PRESENTASI == 'Daring') <a href="{{$data->PROPOSAL_MEDIA_PRESENTASI}}" class="btn btn-link btn-sm" target="_blank">Klik disini</a> @else di {{$data->PROPOSAL_MEDIA_PRESENTASI}} @endif
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    
                                @elseif($data->PROPOSAL_STATUS == 'Revisi Proposal')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 1</b> untuk upload revisi proposal
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            @elseif($data->PROPOSAL_TAHAPAN == '2')
                                
                                @if($data->PROPOSAL_STATUS == 'Kelengkapan Dokumen')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 2</b> untuk melengkapi dokumen
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @elseif($data->PROPOSAL_STATUS == 'Verifikasi Dokumen')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Verifikasi Dokumen <b>Tahap 2</b>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif 
                            @elseif($data->PROPOSAL_TAHAPAN == '3')
                                @if($data->PROPOSAL_STATUS == 'Administrasi')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 3</b> untuk proses <b>Administrasi</b>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif 
                            @elseif($data->PROPOSAL_TAHAPAN == '4')
                                
                                @if($data->PROPOSAL_STATUS == 'Pelaksanaan Penelitian')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Informasi!</strong> Klik <b>Tahap 4</b> untuk informasi terbaru Pelaksanaan Penelitian
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                            @elseif($data->PROPOSAL_TAHAPAN == '5')
                                
                                @if($data->PROPOSAL_LAPORAN_PENELITIAN == null || $data->PROPOSAL_RAW_DATA_PENELITIAN == null)
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
                                        {{$data->PROPOSAL_PENELITI_UTAMA}}
                                    </div>
                                    {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Judul Penelitian</div>
                                        {{$data->PROPOSAL_JUDUL_PENELITIAN}}
                                    </div>
                                </li>
                            </ol>

                            <div class="table-responsive">
                                <table class="table table-sm text-center align-midle nowrap">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            
                                            @if($data->PROPOSAL_SURAT_PENOLAKAN != null)
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
                                            @if($data->PROPOSAL_IZIN_PENELITIAN_DRAFT != null)
                                            <th>Surat Izin Penelitian (Draft)</th>
                                            @endif
                                            @if($data->PROPOSAL_IZIN_PENELITIAN != null)
                                            <th>Surat Izin Penelitian</th>
                                            @endif
                                            {{-- <th>Bukti Bayar</th> --}}
                                            <th>Laporan Penelitian</th>
                                            <th>Raw Data Penelitian</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            
                                            @if($data->PROPOSAL_SURAT_PENOLAKAN != null)
                                            <td>
                                                <a href="{{Storage::url('FILE_SURAT_PENOLAKAN/'.$data->PROPOSAL_SURAT_PENOLAKAN)}}" target="_blank" class="btn btn-link text-danger btn-sm blinking">Lihat</a>
                                            </td>
                                            @endif
                                            <td>
                                                @if($data->PROPOSAL_SURAT_PENGANTAR)
                                                <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->PROPOSAL_SURAT_PENGANTAR)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_PROPOSAL_PENELITIAN)
                                                    <button 
                                                        class="w-100 btn btn-link btn-sm btn-history-file" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalproposal" 
                                                        data-pengajuan="{{$data->PROPOSAL_ID}}">
                                                        Lihat
                                                    </button>

                                                    {{-- <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->PROPOSAL_PROPOSAL_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a> --}}
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_KAJI_ETIK)
                                                <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->PROPOSAL_KAJI_ETIK)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_KERAHASIAAN)
                                                <a href="{{Storage::url('FILE_KERAHASIAAN/'.$data->PROPOSAL_KERAHASIAAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_SERTIFIKAT_GCP)
                                                <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->PROPOSAL_SERTIFIKAT_GCP)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_KAJI_ETIK_RSPI)
                                                <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$data->PROPOSAL_KAJI_ETIK_RSPI)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_PKS)
                                                <a href="{{Storage::url('FILE_PKS/'.$data->PROPOSAL_PKS)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_MTA)
                                                <a href="{{Storage::url('FILE_MTA/'.$data->PROPOSAL_MTA)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td>
                                            @if($data->PROPOSAL_IZIN_PENELITIAN_DRAFT != null)
                                            <td>
                                                <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$data->PROPOSAL_IZIN_PENELITIAN_DRAFT)}}" target="_blank" class="btn btn-link text-danger btn-sm blinking">Lihat</a>
                                            </td>
                                            @endif
                                            @if($data->PROPOSAL_IZIN_PENELITIAN != null)
                                            <td>
                                                <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->PROPOSAL_IZIN_PENELITIAN)}}" target="_blank" class="btn btn-link text-danger btn-sm blinking">Lihat</a>
                                            </td>
                                            @endif
                                            {{-- <td>
                                                @if($data->PROPOSAL_BUKTI_BAYAR)
                                                <a href="{{Storage::url('FILE_BUKTI_BAYAR/'.$data->PROPOSAL_BUKTI_BAYAR)}}" target="_blank" class="btn btn-link btn-sm">bukti bayar</a>
                                                @else
                                                    <span class="btn btn-link btn-sm disabled">Kosong</span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                @if($data->PROPOSAL_LAPORAN_PENELITIAN)
                                                <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->PROPOSAL_LAPORAN_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
                                                @else
                                                    <button class="btn btn-link btn-sm disabled">Kosong</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->PROPOSAL_RAW_DATA_PENELITIAN)
                                                <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->PROPOSAL_RAW_DATA_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm">Lihat</a>
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
                                        @if($data->PROPOSAL_STATUS == '-')
                                            Status: <span class="badge badge-danger blinking">Menunggu</span>
                                        @else
                                            Status: <span class="badge badge-success blinkin">{{$data->PROPOSAL_STATUS}}</span>
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