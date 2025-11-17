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
            <span class="card-label fw-bolder text-dark">Riwayat Proposal</span>
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
                        </thead>
                        <tbody>
                            @foreach ($pengajuanpenelitian as $data)
                                
                            <tr class="align-middle border-secondary border-bottom">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{url('/antrian-proposal/'.$data->PROPOSAL_ID)}}" class="btn btn-sm btn-secondary w-100">Detail</a> <br>
                                    <button class="btn btn-sm btn-danger text-white btn-delete-pengajuan disabled" hidden data-pengajuan="{{$data->PROPOSAL_ID}}">
                                        Batalkan
                                    </button>
                                    <a 
                                        href="{{url('riwayat-proposal-return/'.$data->PROPOSAL_ID)}}"
                                        onclick="return confirm('Yakin di return ? data akan di kembalikan ke antrian')"
                                        class="btn btn-sm btn-warning text-dark modalstatus">
                                        {{-- data-bs-toggle="modal" 
                                        data-bs-target="#modalstatus" 
                                        data-pengajuan="{{$data->PROPOSAL_ID}}"
                                        data-status="{{$data->PROPOSAL_STATUS}}"> --}}
                                        <b>Return</b>
                                    </a>
                                </td>
                                <td>#{{$data->PROPOSAL_KODE}}</td>
                                <td>
                                    @if($data->PROPOSAL_STATUS)
                                        {{$data->PROPOSAL_STATUS}}
                                    @else
                                        Belum Input
                                    @endif
                                </td>
                                <td>{{$data->PROPOSAL_PENELITI_UTAMA}}</td>
                                <td>{{$data->PROPOSAL_EMAIL}}</td>
                                <td>{{$data->PROPOSAL_PHONE}}</td>
                                <td>{{$data->PROPOSAL_INSTITUSI_ASAL}}</td>
                                <td>
                                    <span class="text-break">
                                        {{$data->PROPOSAL_TIM_PENELITI}}
                                    </span>
                                </td>
                                <td>{{$data->PROPOSAL_JUDUL_PENELITIAN}}</td>
                                <td>
                                    @if($data->PROPOSAL_SURAT_PENGANTAR)
                                    <a href="{{Storage::url('FILE_SURAT_PENGANTAR/'.$data->PROPOSAL_SURAT_PENGANTAR)}}" target="_blank" class="btn btn-link btn-sm text-danger">surat pengantar</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_PROPOSAL_PENELITIAN)
                                    <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->PROPOSAL_PROPOSAL_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm text-danger">proposal penelitian</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_KAJI_ETIK)
                                    <a href="{{Storage::url('FILE_KAJI_ETIK/'.$data->PROPOSAL_KAJI_ETIK)}}" target="_blank" class="btn btn-link btn-sm text-danger">kaji etik</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_SERTIFIKAT_GCP)
                                    <a href="{{Storage::url('FILE_SERTIFIKAT_GCP/'.$data->PROPOSAL_SERTIFIKAT_GCP)}}" target="_blank" class="btn btn-link btn-sm text-danger">gcp</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_KAJI_ETIK_RSPI)
                                    <a href="{{Storage::url('FILE_KAJI_ETIK_RSPI/'.$data->PROPOSAL_KAJI_ETIK_RSPI)}}" target="_blank" class="btn btn-link btn-sm text-danger">kaji etik rspi</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_PKS)
                                    <a href="{{Storage::url('FILE_PKS/'.$data->PROPOSAL_PKS)}}" target="_blank" class="btn btn-link btn-sm text-danger">pks</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_MTA)
                                    <a href="{{Storage::url('FILE_MTA/'.$data->PROPOSAL_MTA)}}" target="_blank" class="btn btn-link btn-sm text-danger">mta</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_SURAT_PENOLAKAN)
                                    <a href="{{Storage::url('FILE_SURAT_PENOLAKAN/'.$data->PROPOSAL_SURAT_PENOLAKAN)}}" target="_blank" class="btn btn-link btn-sm text-danger">penolakan</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_BUKTI_BAYAR)
                                    <a href="{{Storage::url('FILE_BUKTI_BAYAR/'.$data->PROPOSAL_BUKTI_BAYAR)}}" target="_blank" class="btn btn-link btn-sm text-danger">bukti bayar</a>
                                    @else
                                        <span class="btn btn-link btn-sm disabled">Kosong</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_IZIN_PENELITIAN_DRAFT)
                                    <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN_DRAFT/'.$data->PROPOSAL_IZIN_PENELITIAN_DRAFT)}}" target="_blank" class="btn btn-link btn-sm text-danger">Draft Izin Penelitian</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_LAPORAN_PENELITIAN)
                                    <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->PROPOSAL_LAPORAN_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm text-danger">laporan penelitian</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_RAW_DATA_PENELITIAN)
                                    <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->PROPOSAL_RAW_DATA_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm text-danger">raw data</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->PROPOSAL_IZIN_PENELITIAN)
                                    <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->PROPOSAL_IZIN_PENELITIAN)}}" target="_blank" class="btn btn-link btn-sm text-danger">Izin Penelitian</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
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
                    <select class="form-select form-select-solid" id="status" name="status">
                        <option>Pilih status..</option>
                        <option value="Proses Telaah">Proses Telaah</option>
                        <option value="Penjadwalan Paparan">Penjadwalan Paparan</option>
                        <option value="Pengajuan / Registrasi Etik Penelitian">Pengajuan / Registrasi Etik Penelitian</option>
                        <option value="Proses Izin Penelitian">Proses Izin Penelitian</option>
                        <option value="Penelitian Dimulai">Penelitian Dimulai</option>
                        <option value="Perbaikan Data">*Perbaikan Data</option>
                        <option value="Verifikasi Perbaikan Data">*Verifikasi Perbaikan Data</option>
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

@endsection

@section('js')
    <<script src="{{url('/Twebsite/v1/plugins/custom/datatables/datatables.bundle.js')}}"></script>
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

            $('.modalstatus').on('click', function(){
                let pengajuan = $(this).data('pengajuan');
                let status = $(this).data('status');

                $('#status').val(status);
                $('.formstatus').attr('action',`{{url('/antrian-proposal/${pengajuan}/update')}}`);
            })
        })
    </script>
@endsection