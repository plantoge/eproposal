@extends('layout.panel.masterPanel')

@section('css')
      <link href="{{asset('public/dashboard/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
      {{-- <link href="{{asset('public/tambahan/select2/css/select2.min.css')}}" rel="stylesheet" /> --}}
@endsection
@section('buttonHeader')
    
@endsection

@section('konten')
<button type="button" data-bs-toggle="modal" data-bs-target="#tambah-sotk" class="float-right btn btn-info">Tambah Data</button>
    <a href="{{url('struktur-organisasi/has-user-sotk/empty')}}" class="btn btn-danger ms-3" onclick="return confirm('Yakin Reset ulang semua akses ?')">Reset</a>
    <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap text-left">
              <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($data as $i)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$i->kode}}</td>
                        <td>{{$i->jabatan}}</td>
                        <td class="d-flex justify-content-center">
                            <button 
                                id="edit"
                                class="btn btn-info btn-sm me-1" 
                                data-bs-toggle="modal" 
                                data-bs-target="#edit-sotk"
                                data-id="{{$i->id}}"
                                data-jabatan="{{$i->jabatan}}">Akses</button>
                            <form method="POST" action="{{url('/struktur-organisasi/'.$i->id.'/delete')}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin di hapus ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
            @if(session('Sukses'))
              <div class="alert alert-success" role="alert">
                  {{session('Sukses')}}
              </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">

          <div class="modal fade" id="tambah-sotk" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Data</h3>
    
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                </div>
    
                <div class="modal-body">
                  
                  
                    <div class="container">
                      <div class="row">
                        <div class="col offset-lg-3 col-lg-6 mb-12">
                          <form action="{{url('struktur-organisasi/store-pimpinan')}}" method="post">
                              @csrf
                              <div class="mb-3">
                                <label for="pemimpinutama" class="form-label">Pimpinan</label>
                                <input type="text" class="form-control" id="pemimpinutama" name="pimpinan" placeholder="Direktur Utama">
                              </div>
                              <button type="submit" class="btn btn-primary w-100">Simpan</button>
                          </form>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-lg-4 mt-4">
                            <div class="form-group">
                              <label class="form-label">Atasan</label>
                              <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#tambah-sotk" aria-label="Select" onchange="kepala(this)">
                                <option>Pilih Atasan</option>
                                @foreach ($data as $item)
                                  <option data-idpimpinan="{{$item->id}}">{{$item->jabatan}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col col-lg-12">
                            <form action="{{url('/struktur-organisasi/store')}}" method="post">
                              @csrf

                              <table class="table table-bordered mt-4">
                                  <thead class="thead">
                                      <tr>
                                          <th class="align-middle text-center w-25">Kode</th>
                                          <th class="align-middle text-center w-75">Nama Jabatan</th>
                                          <th class="align-middle text-center">
                                            <a href="javascript:;" class="btn btn-primary addrow">+</a>
                                            <input type="text" id="jumlah-row" value="1" class="form-control" hidde>
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody class="tbody">
                                      
                                      <tr class="list_row_item align-middle">
                                          <td class="text-center">
                                              <div class="form-group">
                                                  <input type="text" id="head" name="head[]" value="" class="form-control" hidde>
                                                  <input type="text" id="parent" name="parent[]" value="" class="form-control" hidde>
                                                  <input type="text" id="child" name="child[]" value="" class="form-control" hidde>
                                                  <div class="input-group">
                                                    <span class="input-group-text" id="">1</span>
                                                    <input type="text" class="form-control" id="kode" name="kode[]" readonly/>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="text-center">
                                              <div class="form-group">
                                                  <input type="text" id="jabatan" name="jabatan[]" value="" class="form-control" required>
                                              </div>
                                          </td>
                                          <td class="text-center">
                                              <a id="minus" href="javascript:;" data-nilai="" class="btn btn-danger deletero" data-toggle="tooltip" data-placement="top" title="Klik Dari bawah" disabled >-</a>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                              <button type="submit" class="btn btn-primary float-end">Simpan</button>
                            </form>
                          </div>

                      </div>
                    </div>

                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col">

          <div class="modal fade" id="edit-sotk" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Relasikan</h3>
    
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                </div>
    
                <div class="modal-body">
                  
                  
                    <div class="containe">
                      <div class="row">
                        <div class="col-12">
                          <form action="{{url('struktur-organisasi/has-user')}}" method="post">
                              @csrf
                              <div class="mb-3">
                                <label for="pemimpinutama" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="strukturorganisasi_id" name="strukturorganisasi_id" value="" hidden>
                                <input type="text" class="form-control" id="jabatann" name="jabatann" value="" readonly>
                              </div>
                              <div class="form-group">
                                <label class="form-label">User</label>
                                <select id="select2" class="form-select form-control-lg form-select-solid" name="user_id">
                                  <option>Pilih User</option>
                                  @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-12">
                          <h3 class="mt-10">Hasil :</h3>
                          <div id="hasilrelasi">

                          </div>
                        </div>
                      </div>
                    </div>

                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

@endsection

@section('js')
      <script src="{{asset('public/dashboard/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      {{-- <script src="{{asset('public/tambahan/select2/js/select2.min.js')}}"></script> --}}
      <script>
        $('#select2').select2({
          dropdownParent: $('#edit-sotk') //script untuk menjalankan searching select2 di dalam modal
        });

        async function kepala(data) {
          var el = $(data);
          var id = el.val();
          var parent = el.parent().parent().parent();
          var idpimpinan = parent.find(':selected').data('idpimpinan');
          var _token = $('input[name="_token"]').val();

          const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

          try {
            // response Pertama --------------------------------------------------------------------------------------
            const response1 = await fetch("<?= url('struktur-organisasi/filter-satu'); ?>", {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                'idpimpinan': idpimpinan
              })
              // Jika ada parameter lain, Anda bisa menggabungkannya di sini
            });
            const data1 = await response1.json();

            $('#head').val(parseInt(data1.head) + 1);
            $('#parent').val(data1.kode); //otomatis alihkan kode atasan yg di pilih menjadi parent untuk bawahannya.
            // ---------------------------------------------------------------------------------------------------------
            // response Kedua ------------------------------------------------------------------------------------------
            const response2 = await fetch("<?= url('struktur-organisasi/filter-dua'); ?>", {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                'kode': data1.kode
              })
              // Jika ada parameter lain, Anda bisa menggabungkannya di sini
            });
            const data2 = await response2.json();
            
            $('#child').val(data2);
            $('#kode').val(data1.kode+'.'+data2);
            // ---------------------------------------------------------------------------------------------------------

          } catch (error) {
            console.error('Error fetching data:', error);
          }
        }

        $('.thead').on('click', '.addrow', function(){

          var jumlah = parseInt($("#jumlah-row").val()); 
          var nomor = parseInt(jumlah) + 1;

          var parent = $('#parent').val();
          var head = $('#head').val();

          var datachild = parseInt($('#child').val());
          var total_baris = $('.tbody').find('tr').length;
          const child = datachild + total_baris;

          var tr = '<tr class="list_row_item align-middle">'+
                      '<td class="text-center">'+
                          '<div class="form-group">'+
                              '<input type="text" id="head" name="head[]" value="'+head+'" class="form-control" hidde>'+
                              '<input type="text" name="parent[]" value="'+parent+'" class="form-control" required hidde>'+
                              '<input type="text" name="child[]" value="'+child+'" class="form-control" required hidde>'+
                              '<div class="input-group">'+
                                '<span class="input-group-text" id="basic-addon3">'+nomor+'</span>'+
                                '<input type="text" class="form-control" name="kode[]" value="'+parent+'.'+child+'" readonly/>'+
                              '</div>'+
                          '</div>'+
                      '</td>'+
                      '<td class="text-center">'+
                          '<div class="form-group">'+
                              '<input type="text" id="jabatan" name="jabatan[]" value="" class="form-control" required>'+
                          '</div>'+
                      '</td>'+
                      '<td class="align-middle text-center">'+
                          '<a href="javascript:;" class="btn btn-danger deleterow" data-toggle="tooltip" data-placement="top" title="Klik Dari bawah">-</a>'+
                      '</td>'+
                  '</tr>';
          $('.tbody').append(tr);
          $("#jumlah-row").val(nomor);
        });

        $('.tbody').on('click', '.deleterow', function (){
          // menghapus satu baris TD dengan fungsi parent
          $(this).parent().parent().remove();

          // proses pengurangan angka urutan jika di hapus
          var urutan = $('.tbody').find('tr').length;
          $("#jumlah-row").val(urutan);

        });

        $(document).on('click', '#edit', function(){
          var id = $(this).data('id');
          var jabatan = $(this).data('jabatan');

          $('#strukturorganisasi_id').val(id);
          $('#jabatann').val(jabatan);

          gethasusersotk(id);

        })

        async function gethasusersotk(sotk_id) {
          var _token = $('input[name="_token"]').val();
          const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

          try {
            // response Pertama --------------------------------------------------------------------------------------
            const response1 = await fetch("<?= url('struktur-organisasi/filter-tiga'); ?>", {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                'sotk_id': sotk_id
              })
              // Jika ada parameter lain, Anda bisa menggabungkannya di sini
            });
            const data1 = await response1.json();

            let loop = '<ul class="list-group">';
            // loop data
            data1.forEach(element => {
              loop += '<li class="list-group-item">'+element.name+'</li>'
            });
            loop += '</ul>';

            $('#hasilrelasi').html(loop);

          } catch (error) {
            console.error('Error fetching data:', error);
          }
        }
      </script>
      
@endsection