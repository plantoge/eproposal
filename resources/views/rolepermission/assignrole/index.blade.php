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
              <table id="datatable" class="table table-striped table-sm table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                  @foreach($Musers as $i)
                    <tr>
                        <td>{{$i->name}}</td>
                        <td>{{$i->username}}</td>
                        <td>{{$i->email}}</td>
                        <td class="d-flex justify-content-center">
                          <a href='{{url("/assignrole/{$i->id}/create")}}' class="btn btn-info btn-sm me-1">Assign Role</a>
                          <a href='{{url("/assignrole/{$i->id}/edit")}}' class="btn btn-danger btn-sm me-1">Remove Role</a>
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
    
@endsection
