@extends('layouts.sidebar')
@section('tittle', 'Lab Report')
@section('content')
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">OPTHALMIC PROCEDURES</h3>
                    <div class="col-auto d-flex">
                        <div class="dropdown ">
                            <button class="btn btn-primary dropdown-toggle  " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient Name
                            </button>
                            <ul class="dropdown-menu  dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                @foreach($patients as $patient)
                                    <li>
                                        <a class="dropdown-item {{ $selectedPatientId == $patient->id ? 'active' : '' }}"
                                           href="{{ route('lab.report.index', ['patient_id' => $patient->id]) }}">
                                            {{ $patient->last_name }} {{$patient->first_name}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <button type="button" class="btn btn-secondary ms-1 " data-bs-toggle="modal" data-bs-target="#sendfile"><i class="icofont-send-mail me-2 fs-6"></i>Share Files</button>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row align-items-center mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Full Body Report</h6>
                    </div>
                    <div class="card-body">
                        <div class="echart" id="whaterleval" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div><!-- Row end  -->

        <div class="row align-items-center row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4 g-3">

            @php
                $reportFields = [
                    ['label' => 'DVA Unaided Right', 'key' => 'dva_unaided_right'],
                    ['label' => 'DVA Unaided Left', 'key' => 'dva_unaided_left'],
                    ['label' => 'DVA Aided Right', 'key' => 'dva_aided_right'],
                    ['label' => 'DVA Aided Left', 'key' => 'dva_aided_left'],
                    ['label' => 'DVA with PINHole Right', 'key' => 'dva_with_pinhole_right'],
                    ['label' => 'DVA with PINHole Left', 'key' => 'dva_with_pinhole_left'],
                    ['label' => 'NVA Unaided Right', 'key' => 'nva_unaided_right'],
                    ['label' => 'NVA Unaided Left', 'key' => 'nva_unaided_left'],
                    ['label' => 'NVA Aided Right', 'key' => 'nva_aided_right'],
                    ['label' => 'NVA Aided Left', 'key' => 'nva_aided_left'],
                    ['label' => 'Tonometry Right', 'key' => 'tonometry_right'],
                    ['label' => 'Tonometry Left', 'key' => 'tonometry_left'],
                    ['label' => 'Ginoscopy Right', 'key' => 'ginoscopy_right'],
                    ['label' => 'Ginoscopy Left', 'key' => 'ginoscopy_left'],
                    ['label' => 'VFA Right', 'key' => 'vfa_right'],
                    ['label' => 'VFA Left', 'key' => 'vfa_left'],
                    ['label' => 'CVF Right', 'key' => 'cvf_right'],
                    ['label' => 'CVF Left', 'key' => 'cvf_left'],
                ];
            @endphp

            @foreach ($reportFields as $index => $field)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">{{ $field['label'] }}</span>
                                <span class="text-muted">{{ $report->{$field['key']} ?? 'N/A' }}</span>
                            </div>
                            <div id="apexspark-chart{{ $index + 1 }}"></div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="modal fade" id="sendfile" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="sendsheetLabel"> Share Files</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                    <button type="submit" class="btn btn-primary">sent</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
        <script>
            // Dynamic lab report values from backend
            const labData = @json($report);

            // Body silhouette chart using ECharts
            var chartDom = document.getElementById('whaterleval');
            var myChart = echarts.init(chartDom);
            var option = {
                title: {
                    text: '',
                },
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: ['Before treatment', 'After treatment'],
                    top: 10,
                },
                xAxis: {
                    type: 'category',
                    data: ['Head', 'Torso', 'Legs', 'Arms']
                },
                yAxis: {
                    type: 'value',
                    min: 0,
                    max: 100
                },
                series: [
                    {
                        name: 'Before treatment',
                        type: 'bar',
                        data: labData.full_body_before || [82, 23, 67, 59],
                        itemStyle: { color: '#3f51b5' }
                    },
                    {
                        name: 'After treatment',
                        type: 'bar',
                        data: labData.full_body_after || [30, 40, 50, 20],
                        itemStyle: { color: '#ccc' }
                    }
                ]
            };
            myChart.setOption(option);

            // Reusable function to draw spark charts
            function renderSparkLine(id, values, color = "#2196f3") {
                new ApexCharts(document.querySelector(id), {
                    chart: {
                        type: 'line',
                        height: 60,
                        sparkline: {
                            enabled: true
                        }
                    },
                    stroke: {
                        width: 2
                    },
                    series: [{
                        data: values
                    }],
                    colors: [color],
                }).render();
            }

            // Sample random chart values (Replace with historical data if available)
            renderSparkLine("#apexspark-chart1", [140, 138, 141, 137, 139, 140], "#00bcd4"); // Sodium
            renderSparkLine("#apexspark-chart2", [135, 138, 140, 139, 136, 140], "#ff9800"); // Potassium
            renderSparkLine("#apexspark-chart3", [84, 88, 79, 81, 85, 84], "#607d8b");       // Glucose
            renderSparkLine("#apexspark-chart4", [8.8, 9.2, 9.5, 9.8, 9.1, 9.5], "#3f51b5");  // Calcium
            renderSparkLine("#apexspark-chart5", [60, 62, 66, 61, 59, 66], "#5c6bc0");       // Phosphatase
            renderSparkLine("#apexspark-chart6", [30, 31, 33, 30, 32, 31], "#ef5350");       // Bicarbonate
            renderSparkLine("#apexspark-chart7", [240, 235, 245, 238, 236, 240], "#4caf50"); // Cholesterol
            renderSparkLine("#apexspark-chart8", [138, 142, 140, 144, 139, 140], "#f57c00"); // Triglycerides
            renderSparkLine("#apexspark-chart9", [5.1, 5.3, 5.0, 5.4, 5.2, 5.3], "#e91e63"); // WBC
            renderSparkLine("#apexspark-chart10", [138, 139, 140, 137, 138, 140], "#7986cb"); // Hemoglobin
            renderSparkLine("#apexspark-chart11", [1.6, 1.7, 1.8, 1.9, 1.8, 1.8], "#26c6da"); // Cretinism
            renderSparkLine("#apexspark-chart12", [6.1, 6.5, 6.3, 6.4, 6.3, 6.3], "#ab47bc"); // Thyroid
        </script>
    @endpush

@endsection
