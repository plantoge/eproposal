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

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-200px">
                    <li class="nav-item w-100 me-0 mb-md-2">
                        <a 
                            class="nav-link w-100 btn btn-flex btn-active-light-primary @if($proposal->proposal_tahapan == '1') active @else disabled @endif" 
                            data-bs-toggle="tab" 
                            href="#kt_vtab_pane_1">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 1</span>
                                <span class="fs-7">Pengajuan Proposal</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100 me-0 mb-md-2">
                        <a 
                            {{-- class="nav-link w-100 btn btn-flex btn-active-light-primary @if($proposal->proposal_tahapan == '2') active @else disabled @endif"  --}}
                            class="nav-link w-100 btn btn-flex btn-active-light-primary @if($proposal->proposal_tahapan < '2') disabled @endif" 
                            data-bs-toggle="tab" 
                            href="#kt_vtab_pane_2">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 2</span>
                                <span class="fs-7">Kelengkapan Dokumen</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a 
                            class="nav-link w-100 btn btn-flex btn-active-light-primary @if($proposal->proposal_tahapan == '3') active @else disabled @endif" 
                            data-bs-toggle="tab" 
                            href="#kt_vtab_pane_3">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 3</span>
                                <span class="fs-7">Administrasi</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a 
                            class="nav-link w-100 btn btn-flex btn-active-light-primary @if($proposal->proposal_tahapan == '4') active @else disabled @endif" 
                            data-bs-toggle="tab" 
                            href="#kt_vtab_pane_3b">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 4</span>
                                <span class="fs-7">Pelaksanaan Penelitian</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a 
                            class="nav-link w-100 btn btn-flex btn-active-light-primary @if($proposal->proposal_tahapan == '5') active @else disabled @endif" 
                            data-bs-toggle="tab" 
                            href="#kt_vtab_pane_5">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 5</span>
                                <span class="fs-7">Dokumen Akhir</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-lg-9">

                <div class="tab-content" id="myTabContent">
                    <div 
                        role="tabpanel"
                        id="kt_vtab_pane_1" 
                        class="tab-pane fade @if($proposal->proposal_tahapan == '1') show active @else  @endif">
                        @if($proposal->proposal_tahapan == '1') @include('module/admin/VI_pengajuan_proposal/edit')  @endif
                    </div>
                    <div 
                        id="kt_vtab_pane_2" 
                        role="tabpanel"
                        {{-- class="tab-pane fade @if($proposal->proposal_tahapan == '2') show active @else  @endif">  --}}
                        class="tab-pane fade @if($proposal->proposal_tahapan == '2') show active @else show  @endif"> 
                        @if($proposal->proposal_tahapan >= '2') 
                            @include('module/admin/VI_pengajuan_proposal/tahap2')
                        @endif
                    </div>
                    <div 
                        id="kt_vtab_pane_3" 
                        role="tabpanel"
                        class="tab-pane fade @if($proposal->proposal_tahapan == '3') show active @else  @endif"> 
                        @if($proposal->proposal_tahapan == '3') @include('module/admin/VI_pengajuan_proposal/tahap3')  @endif
                    </div>
                    <div 
                        id="kt_vtab_pane_3b" 
                        role="tabpanel"
                        class="tab-pane fade @if($proposal->proposal_tahapan == '4') show active @else  @endif"> 
                        @if($proposal->proposal_tahapan == '4') @include('module/admin/VI_pengajuan_proposal/tahap3b')  @endif
                    </div>
                    <div 
                        id="kt_vtab_pane_5" 
                        role="tabpanel"
                        class="tab-pane fade @if($proposal->proposal_tahapan == '5') show active @else  @endif"> 
                        @if($proposal->proposal_tahapan == '5') 
                            @include('module/admin/VI_pengajuan_proposal/tahap4')  
                            {{-- @if($proposal->proposal_izin_penelitian != NULL)
                                @include('module/admin/VI_pengajuan_proposal/tahap4selesai')                              
                            @else
                            @endif --}}
                            
                        @endif
                    </div>
                </div>

            </div>
        </div>

        
    </div>
</div>

@endsection

@section('js')
<script>
    // var element = document.querySelector("#kt_stepper_example_basic");

    // // Initialize Stepper
    // var stepper = new KTStepper(element);

    // // Handle next step
    // stepper.on("kt.stepper.next", function (stepper) {
    //     stepper.goNext(); // go next step
    // });

    // // Handle previous step
    // stepper.on("kt.stepper.previous", function (stepper) {
    //     stepper.goPrevious(); // go previous step
    // });
</script>
@endsection
