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
                                    <a href="{{url('/antrian-proposal/'.$data->id)}}" class="btn btn-sm btn-secondary w-100">Detail</a> <br>
                                    <button class="btn btn-sm btn-danger text-white btn-delete-pengajuan disabled" hidden data-pengajuan="{{$data->id}}">
                                        Batalkan
                                    </button>
                                    <a 
                                        href="{{url('riwayat-proposal-return/'.$data->id)}}"
                                        onclick="return confirm('Yakin di return ? data akan di kembalikan ke antrian')"
                                        class="btn btn-sm btn-warning text-dark modalstatus">
                                        {{-- data-bs-toggle="modal" 
                                        data-bs-target="#modalstatus" 
                                        data-pengajuan="{{$data->id}}"
                                        data-status="{{$data->proposal_status}}"> --}}
                                        <b>Return</b>
                                    </a>
                                </td>
                                <td>#{{$data->proposal_kode}}</td>
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
                                    <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->proposal_proposal_penelitian)}}" target="_blank" class="btn btn-link btn-sm text-danger">proposal penelitian</a>
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
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_laporan_penelitian)
                                    <a href="{{Storage::url('FILE_LAPORAN_PENELITIAN/'.$data->proposal_laporan_penelitian)}}" target="_blank" class="btn btn-link btn-sm text-danger">laporan penelitian</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_raw_data_penelitian)
                                    <a href="{{Storage::url('FILE_RAW_DATA_PENELITIAN/'.$data->proposal_raw_data_penelitian)}}" target="_blank" class="btn btn-link btn-sm text-danger">raw data</a>
                                    @else
                                        <button class="btn btn-link btn-sm">Kosong</button>
                                    @endif
                                </td>
                                <td>
                                    @if($data->proposal_izin_penelitian)
                                    <a href="{{Storage::url('FILE_SURAT_IZIN_PENELITIAN/'.$data->proposal_izin_penelitian)}}" target="_blank" class="btn btn-link btn-sm text-danger">Izin Penelitian</a>
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