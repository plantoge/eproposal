@extends('layout.panel.masterPanel')

@section('konten')
    <div class="row">
        <div class="col-lg-12">
                    
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/givepermission/'.$id.'/update')}}" method="post">
                        @csrf
                        @method('patch')
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col" style="width: 10%;">#</th>
                                <th scope="col" style="width: 90%;">Role</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($Mpermission as $i)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" name="permission[]" type="checkbox" value="{{$i->name}}" id="{{$i->name}}" <?php if($Mrole->hasPermissionTo($i->name)){echo "checked";} ?> >
                                                <input type="hidden" name="id" value="{{$id}}">
                                                <label class="form-check-label" for="{{$i->name}}">
                                                  {{$i->name}}
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a type="submit" href="{{url('givepermission')}}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
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

{{-- <a href="{{url('givepermission/'.$id.'/edit')}}" class="text-muted">Here</a>
@section('js')
        <script src="{{asset('public/dashboard/libs/select2/dist/js/select2.min.js')}}"></script>
        <script>
            $(".js-example-responsive").select2({
                width: 'resolve'
            });
        </script>
@endsection --}}







    

