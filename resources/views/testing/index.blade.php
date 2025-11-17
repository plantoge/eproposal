@extends('layout.master')

@section('css')
      <!-- DataTables -->
      <link href="{{asset('public/dashboard/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
      
@endsection

@section('breadcrumb')
    <div class="col-7 align-self-center">
      <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Testing</h3>
      <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="{{url('/gg')}}">Testing</a>
                  </li>
              </ol>
          </nav>
      </div>
    </div>
    {{-- <div class="col-5 align-self-center">
      <div class="customize-input float-right">
          <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target=".tambah-role">Tambah Data</button>
      </div>
    </div> --}}
@endsection

@section('content')

        <div class="row">
            
            <div class="col col-sm-12 col-md-12 col-lg-12">
                <h3 class="mb-3">Role</h3>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Role</th>
                              <th>Guard</th>
                              <th>Aksi</th>
                              <!-- <th>Aksi</th> -->
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($Mget as $i)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$i->name}}</td>
                              <td>{{$i->guard_name}}</td>
                              <td class="d-flex justify-content-center">
                                <button 
                                  id="edit"
                                  class="btn btn-info btn-sm mr-1" 
                                  data-toggle="modal" 
                                  data-target=".edit-role"
                                  data-id="{{$i->id}}"
                                  data-name="{{$i->name}}"
                                  data-guard_name="{{$i->guard_name}}">Edit</button>
                                {{-- <a href='{{url("/users/{$i->id}/edit")}}' class="btn btn-info btn-sm mr-1">Edit</a> --}}
                                <form method="POST" action="{{url('/role/'.$i->id.'/delete')}}">
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

@endsection

@section('js')
      <!-- DATATABLES -->
      <script src="{{asset('public/dashboard/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

@endsection