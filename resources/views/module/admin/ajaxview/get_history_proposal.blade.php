<div class="table-responsive">
    <table class="table align-middle table-row-bordered table-row-solid ">
        <tbody class="fs-6 fw-semibold text-gray-600">
            @foreach ($file as $data)
                <tr>
                    <td>
                        {{\Carbon\Carbon::parse($data->created_at)->format('d/m/y H:i:s')}}
                    </td>
                    <td class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$data->history_file}}">
                        Proposal Penelitian - {{$loop->iteration}}
                    </td>
                    <td>{{$data->history_keterangan}}</td>
                    <td class="text-end">
                        <a href="{{Storage::url('FILE_PROPOSAL_PENELITIAN/'.$data->history_file)}}" target="_blank" class="btn btn-light btn-sm btn-active-light-primary">Download</a>
                    </td>
                </tr>                              
            @endforeach
        </tbody>
    </table>
</div>