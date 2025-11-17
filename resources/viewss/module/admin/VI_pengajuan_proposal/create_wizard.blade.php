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

{{-- <div class="card border">
    <div class="card-body">

        <div class="stepper stepper-pills" id="kt_stepper_example_basic">
            <div class="stepper-nav flex-center flex-wrap mb-10">
                <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav">
                    <div class="stepper-wrapper d-flex align-items-center">
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">1</span>
                        </div>
            
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Pengajuan
                            </h3>
            
                            <div class="stepper-desc">
                                Description
                            </div>
                        </div>
                    </div>
            
                    <div class="stepper-line h-40px"></div>
                </div>
            
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                    <div class="stepper-wrapper d-flex align-items-center">
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">2</span>
                        </div>
            
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Administrasi
                            </h3>
            
                            <div class="stepper-desc">
                                Description
                            </div>
                        </div>
                    </div>
            
                    <div class="stepper-line h-40px"></div>
                </div>
            
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                    <div class="stepper-wrapper d-flex align-items-center">
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">3</span>
                        </div>
            
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Pelaksanaan Penelitian
                            </h3>
            
                            <div class="stepper-desc">
                                Description
                            </div>
                        </div>
                    </div>
            
                    <div class="stepper-line h-40px"></div>
                </div>
            
            </div>
            
            <form class="form w-lg-500px mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
                <div class="mb-5">
                    <div class="flex-column current" data-kt-stepper-element="content">
                        <div class="fv-row mb-10">
                            <label class="form-label">Example Label 1</label>
        
                            <input type="text" class="form-control form-control-solid" name="input1" placeholder="" value=""/>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">Example Label 2</label>
        
                            <input type="text" class="form-control form-control-solid" name="input2" placeholder="" value=""/>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">Example Label 3</label>
        
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" checked="checked" value="1"/>
                                <span class="form-check-label">
                                    Switch
                                </span>
                            </label>
                        </div>
                    </div>
        
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="fv-row mb-10">
                            <label class="form-label">Example Label 1</label>
        
                            <input type="text" class="form-control form-control-solid" name="input1" placeholder="" value=""/>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">Example Label 2</label>
        
                            <textarea class="form-control form-control-solid" rows="3" name="input2" placeholder=""></textarea>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">Example Label 3</label>
        
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" checked="checked" type="checkbox" value="1"/>
                                <span class="form-check-label">
                                    Checkbox
                                </span>
                            </label>
                        </div>
                    </div>
        
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="fv-row mb-10">
                            <label class="form-label d-flex align-items-center">
                                <span class="required">Input 1</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Example tooltip"></i>
                            </label>
        
                            <input type="text" class="form-control form-control-solid" name="input1" placeholder="" value=""/>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">
                                Input 2
                            </label>
        
                            <input type="text" class="form-control form-control-solid" name="input2" placeholder="" value=""/>
                        </div>
                    </div>
        
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="fv-row mb-10">
                            <label class="form-label d-flex align-items-center">
                                <span class="required">Input 1</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Example tooltip"></i>
                            </label>
        
                            <input type="text" class="form-control form-control-solid" name="input1" placeholder="" value=""/>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">
                                Input 2
                            </label>
        
                            <input type="text" class="form-control form-control-solid" name="input2" placeholder="" value=""/>
                        </div>
        
                        <div class="fv-row mb-10">
                            <label class="form-label">
                                Input 3
                            </label>
        
                            <input type="text" class="form-control form-control-solid" name="input3" placeholder="" value=""/>
                        </div>
                    </div>
                </div>
        
                <div class="d-flex flex-stack">
                    <div class="me-2">
                        <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                            Back
                        </button>
                    </div>
        
                    <div>
                        <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
        
                        <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                            Continue
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div> --}}

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-200px">
                    <li class="nav-item w-100 me-0 mb-md-2">
                        <a class="nav-link w-100 active btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#kt_vtab_pane_1">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 1</span>
                                <span class="fs-7">Pengajuan Proposal</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100 me-0 mb-md-2">
                        <a class="nav-link w-100 btn btn-flex btn-active-light-info disabled" data-bs-toggle="tab" href="#kt_vtab_pane_2">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 2</span>
                                <span class="fs-7">Kelengkapan Dokumen</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100 me-0 mb-md-2">
                        <a class="nav-link w-100 btn btn-flex btn-active-light-info disabled" data-bs-toggle="tab" href="#kt_vtab_pane_3">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 3</span>
                                <span class="fs-7">Administrasi</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link w-100 btn btn-flex btn-active-light-danger disabled" data-bs-toggle="tab" href="#kt_vtab_pane_4">
                            <span class="svg-icon fs-2"><svg>...</svg></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">Tahap 4</span>
                                <span class="fs-7">Pelaksanaan Penelitian</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link w-100 btn btn-flex btn-active-light-danger disabled" data-bs-toggle="tab" href="#kt_vtab_pane_5">
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
                    <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                        @include('module/admin/VI_pengajuan_proposal/create')
                    </div>
                    <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">
                        ...
                    </div>
                </div>

            </div>
        </div>

        
    </div>
</div>

@endsection

@section('js')
<script>
    var element = document.querySelector("#kt_stepper_example_basic");

    // Initialize Stepper
    var stepper = new KTStepper(element);

    // Handle next step
    stepper.on("kt.stepper.next", function (stepper) {
        stepper.goNext(); // go next step
    });

    // Handle previous step
    stepper.on("kt.stepper.previous", function (stepper) {
        stepper.goPrevious(); // go previous step
    });
</script>
@endsection
