@extends('layout.dashboard.v2.masterv2Dashboard')

@section('css')

@endsection

@section('breadcrumb')
    <div class="col-12 align-self-center">
        <h3 class="">Hi, {{Auth::user()->name}}</h3>
        {{-- <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{Auth::user()->name}}</h3> --}}
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

@endsection

@section('js')
    <script src="{{asset('public/tambahan/js/formatrupiah.js')}}"></script>
    <script>
        var initChartsWidget1 = function() {
            var realisasi_pendapatan = document.getElementById("realisasi_pendapatan");
            var saldo_kas_blu = document.getElementById("saldo_kas_blu");
            var saldo_rekening_blu = document.getElementById("saldo_rekening_blu");
            // var saldo_gabungan_kas_blu = document.getElementById("saldo_gabungan_kas_blu");
        
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
            var baseColor = KTUtil.getCssVariableValue('--bs-primary');
            var lightColor = KTUtil.getCssVariableValue('--bs-gray-200');

            if (!realisasi_pendapatan || !saldo_kas_blu || !saldo_rekening_blu) {
                return;
            }

            var height = parseInt(KTUtil.css(realisasi_pendapatan, 'height'));

            var options1 = {
                series: [{
                    name: 'Realisasi',
                    data: [
                        @php 
                            foreach($realisasi_pendapatan as $item){
                                echo $item['total_realisasi'] . ', ' ;
                            }
                        @endphp
                    ]
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {

                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [baseColor]
                },
                xaxis: {
                    categories: [
                        @foreach ($realisasi_pendapatan as $item)
                            '{{ $item['bulan'] }}',
                        @endforeach
                    ],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    },
                    crosshairs: {
                        position: 'front',
                        stroke: {
                            color: baseColor,
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return "Rp. " + val.toLocaleString('id-ID') + " "
                        }
                    }
                },
                colors: [lightColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                markers: {
                    strokeColor: baseColor,
                    strokeWidth: 3
                }
            };
            
            var options2 = {
                series: [{
                    name: 'Saldo',
                    data: [
                        @php 
                            foreach($saldokas as $item){
                                echo $item['saldokas'] . ', ' ;
                            }
                        @endphp
                    ]
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {

                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [baseColor]
                },
                xaxis: {
                    categories: [
                        @foreach ($saldokas as $item)
                            '{{ $item['bulan'] }}',
                        @endforeach
                    ],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    },
                    crosshairs: {
                        position: 'front',
                        stroke: {
                            color: baseColor,
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return "Rp. " + val.toLocaleString('id-ID') + " "
                        }
                    }
                },
                colors: [lightColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                markers: {
                    strokeColor: baseColor,
                    strokeWidth: 3
                }
            };

            // var options3 = {
            //     series: [{
            //         name: 'Saldo',
            //         data: [
            //             @php 
            //                 foreach($dataSaldoKas as $item){
            //                     echo $item['saldo_gabungan_akhir_bulan'] . ', ' ;
            //                 }
            //             @endphp
            //         ]
            //     }],
            //     chart: {
            //         fontFamily: 'inherit',
            //         type: 'area',
            //         height: 350,
            //         toolbar: {
            //             show: false
            //         }
            //     },
            //     plotOptions: {

            //     },
            //     legend: {
            //         show: false
            //     },
            //     dataLabels: {
            //         enabled: false
            //     },
            //     fill: {
            //         type: 'solid',
            //         opacity: 1
            //     },
            //     stroke: {
            //         curve: 'smooth',
            //         show: true,
            //         width: 3,
            //         colors: [baseColor]
            //     },
            //     xaxis: {
            //         categories: [
            //             @foreach ($dataSaldoKas as $item)
            //                 '{{ $item['bulan'] }}',
            //             @endforeach
            //         ],
            //         axisBorder: {
            //             show: false,
            //         },
            //         axisTicks: {
            //             show: false
            //         },
            //         labels: {
            //             style: {
            //                 colors: labelColor,
            //                 fontSize: '12px'
            //             }
            //         },
            //         crosshairs: {
            //             position: 'front',
            //             stroke: {
            //                 color: baseColor,
            //                 width: 1,
            //                 dashArray: 3
            //             }
            //         },
            //         tooltip: {
            //             enabled: true,
            //             formatter: undefined,
            //             offsetY: 0,
            //             style: {
            //                 fontSize: '12px'
            //             }
            //         }
            //     },
            //     yaxis: {
            //         labels: {
            //             style: {
            //                 colors: labelColor,
            //                 fontSize: '12px'
            //             }
            //         }
            //     },
            //     states: {
            //         normal: {
            //             filter: {
            //                 type: 'none',
            //                 value: 0
            //             }
            //         },
            //         hover: {
            //             filter: {
            //                 type: 'none',
            //                 value: 0
            //             }
            //         },
            //         active: {
            //             allowMultipleDataPointsSelection: false,
            //             filter: {
            //                 type: 'none',
            //                 value: 0
            //             }
            //         }
            //     },
            //     tooltip: {
            //         style: {
            //             fontSize: '12px'
            //         },
            //         y: {
            //             formatter: function (val) {
            //                 return "Rp. " + val.toLocaleString('id-ID') + " "
            //             }
            //         }
            //     },
            //     colors: [lightColor],
            //     grid: {
            //         borderColor: borderColor,
            //         strokeDashArray: 4,
            //         yaxis: {
            //             lines: {
            //                 show: true
            //             }
            //         }
            //     },
            //     markers: {
            //         strokeColor: baseColor,
            //         strokeWidth: 3
            //     }
            // };

            var options4 = {
                series: [{
                    name: 'Saldo',
                    data: [
                        @php 
                            foreach($saldorekening as $item){
                                echo $item['saldorekening'] . ', ' ;
                            }
                        @endphp
                    ]
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {

                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [baseColor]
                },
                xaxis: {
                    categories: [
                        @foreach ($saldorekening as $item)
                            '{{ $item['bulan'] }}',
                        @endforeach
                    ],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    },
                    crosshairs: {
                        position: 'front',
                        stroke: {
                            color: baseColor,
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return "Rp. " + val.toLocaleString('id-ID') + " "
                        }
                    }
                },
                colors: [lightColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                markers: {
                    strokeColor: baseColor,
                    strokeWidth: 3
                }
            };

            // clear
            var chart1 = new ApexCharts(realisasi_pendapatan, options1);
            chart1.render();

            // clear
            var chart2 = new ApexCharts(saldo_kas_blu, options2);
            chart2.render();   

            // var chart3 = new ApexCharts(saldo_gabungan_kas_blu, options3);
            // chart3.render();   

            // clear
            var chart4 = new ApexCharts(saldo_rekening_blu, options4);
            chart4.render();   
        }
        

    </script>
@endsection