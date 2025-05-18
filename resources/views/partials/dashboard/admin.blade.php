@section('content')
    <div class="container-fluid py-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <!-- Users Stat -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                            <p class="mb-0">Users</p>
                        </div>
                        <h1 class="mb-0">{{ $userCount }}</h1>
                    </div>

                    <!-- Items Stat -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                <path d="M12 12l8 -4.5" />
                                <path d="M12 12l0 9" />
                                <path d="M12 12l-8 -4.5" />
                            </svg>
                            <p class="mb-0">Items</p>
                        </div>
                        <h1 class="mb-0">{{ $itemCount }}</h1>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-exchange">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3" />
                                <path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3" />
                            </svg>
                            <p class="mb-0">Active Loans</p>
                        </div>
                        <h1 class="mb-0">{{ $activeBorrowedCount }}</h1>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-list">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 12l.01 0" />
                                <path d="M13 12l2 0" />
                                <path d="M9 16l.01 0" />
                                <path d="M13 16l2 0" />
                            </svg>
                            <p class="mb-0">Records</p>
                        </div>
                        <h1 class="mb-0">{{ $totalRecordCount }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-8 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Borrowing Statistics</h5>
                        <div id="chart-demo-area" class="w-100" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Charts</h5>
                        <div id="chart-demo-pie" class="w-100" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        window.ApexCharts && (new ApexCharts(document.getElementById(
            'chart-demo-pie'), {
            chart: {
                type: "donut",
                fontFamily: 'inherit',
                height: 240,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            series: [{{ $borrowedCount ?? 0 }}, {{ $overdueCount ?? 0 }}, {{ $returnedCount ?? 0 }},
                {{ $rejectedCount ?? 0 }}
            ],
            labels: ["Borrowed", "Overdue", "Returned", 'Rejected'],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            colors: [
                '#FFC107', // Yellow
                '#F44336', // Red
                '#4CAF50', // Green
                '#E91E63' // Pink/Red
            ],
            legend: {
                show: true,
                position: 'bottom',
                offsetY: 12,
                markers: {
                    width: 10,
                    height: 10,
                    radius: 100,
                },
                itemMargin: {
                    horizontal: 8,
                    vertical: 8
                },
            },
            tooltip: {
                fillSeriesColor: false
            },
        })).render();


        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-area'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    colors: [
                        'color-mix(in srgb, transparent, var(--tblr-primary) 16%)',
                        'color-mix(in srgb, transparent, var(--tblr-primary) 16%)',
                    ],
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: @json($areaChartSeries),
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'category',
                    categories: @json($areaChartLabels),
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                colors: [
                    'color-mix(in srgb, transparent, var(--tblr-primary) 100%)',
                    'color-mix(in srgb, transparent, var(--tblr-purple) 100%)'
                ],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
            })).render();
        });
    </script>
@endsection
