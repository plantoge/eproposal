{{-- @extends('layout.dashboard.v2.masterv2Konten') --}}
@extends('layout.panel.masterPanel')

@section('konten')
<div class="row">
  <div class="col-sm-12 col-lg-12 mb-5">
      <div class="card card-dashe">
          <div class="card-header" style="background-color: #00B9AD !important;">
              <h3 class="card-title text-white">
                  Module
              </h3>

              
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Permission</th>
                        <th>Guard</th>
                        <th>Aksi</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                  @foreach($Mpermission as $i)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$i->name}}</td>
                        <td>{{$i->guard_name}}</td>
                        <td class="d-flex justify-content-center">
                          @if($i->id != 4)
                          <button 
                            id="edit"
                            class="btn btn-info btn-sm me-1" 
                            data-bs-toggle="modal" 
                            data-bs-target="#edit-permission"
                            data-id="{{$i->id}}"
                            data-name="{{$i->name}}"
                            data-guard_name="{{$i->guard_name}}">Edit</button>
                          {{-- <a href='{{url("/users/{$i->id}/edit")}}' class="btn btn-info btn-sm mr-1">Edit</a> --}}
                          <form method="POST" action="{{url('/permission/'.$i->id.'/delete')}}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin di hapus ?')">Hapus</button>
                          </form>
                          @endif
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
  </div>
</div>


<div class="row">
  <div class="col">
    
    <div class="modal fade" id="tambah-permission" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title">Tambah Data</h3>

              <!--begin::Close-->
              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <span class="svg-icon svg-icon-1"></span>
              </div>
              <!--end::Close-->
          </div>

          <div class="modal-body">
            
            <form action="{{url('/permission/store')}}" method="post">
              <div class="container mb-4">
                  <div class="row">
                    
                      <div class="col col-lg-12">
                          @csrf
                          <div class="form-group">
                            <label>Nama Permission</label>
                            <input type="text" name="name" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Guard Name</label>
                              <input type="guard_name" name="guard_name" placeholder="web | api" class="form-control">
                          </div>
                      </div>

                  </div>
              </div>

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col">
    
    <div class="modal fade" id="edit-permission" tabindex="-1">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                      <h3 class="modal-title">Edit Data</h3>
      
                      <!--begin::Close-->
                      <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                          <span class="svg-icon svg-icon-1"></span>
                      </div>
                      <!--end::Close-->
                  </div>
      
                  <div class="modal-body">
                    
                    <form id="formedit" method="post">
                      <div class="container mb-4">
                          <div class="row">
                            
                              <div class="col col-lg-12">
                                  @csrf
                                  @method('patch')
                                  <div class="form-group">
                                    <label>Nama Permission</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label>Guard Name</label>
                                      <input type="guard_name" id="guard_name" name="guard_name" placeholder="web | api" class="form-control">
                                  </div>
                                  
                              </div>

                          </div>
                      </div>

                  </div>
      
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                  </div>
            </div>
      </div>
  </div>

  </div>
</div>

    
@endsection

@section('css')
<link href="{{url('Twebsite/v1/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
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

@section('js')
      <script src="{{url('Twebsite/v1/plugins/custom/datatables/datatables.bundle.js')}}"></script>
      <script>
          $("#datatable").DataTable({
              
              dom: 'Bfrtip',
              buttons: [
                {
                  text: 'Tambah',
                  action: function ( e, dt, node, config ) {
                      $('#tambah-permission').modal('show');
                  }
                },
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
                }
              ],
              searching: true,
              paging: true,
              scrollX: true,
          });
      </script>
    
      <script>
        $(document).ready(function(){
          $(document).on('click', '#edit', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var guard_name = $(this).data('guard_name');

            $('#name').val(name);
            $('#guard_name').val(guard_name);

            $('#formedit').attr('action',`{{url('/permission/${id}/update')}}`);
          })
          
        });
      </script>
      
@endsection
