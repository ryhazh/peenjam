@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-3 border-end ps-2">
                    <div class="d-flex gap-2">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg></p>
                        <p>Users</p>
                    </div>
                    <h1>{{ $userCount }}</h1>
                </div>
                <div class="col-3 border-end ps-4">
                    <div class="d-flex gap-2">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg></p>
                        <p>Items</p>
                    </div>
                    <h1>{{ $itemCount }}</h1>
                </div>

                <div class="col-3 border-end ps-4">
                    <div class="d-flex gap-2">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg></p>
                        <p>Active Loans</p>
                    </div>
                    <h1>{{ $activeBorrowedCount }}</h1>
                </div>

                <div class="col-3 ps-4">
                    <div class="d-flex gap-2">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg></p>
                        <p>Records</p>
                    </div>
                    <h1>{{ $totalRecordCount }}</h1>
                </div>


            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-8">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="mb-3">Borrowing Statistic</p>
                        <div id="chart-demo-area"></div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card h-100">
                    <div class="card-body">
                        Charts
                        <div id="chart-demo-pie"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
                    'color-mix(in srgb, transparent, var(--tblr-yellow) 100%)',
                    'color-mix(in srgb, transparent, var(--tblr-red) 100%)',
                    'color-mix(in srgb, transparent, var(--tblr-green) 100%)',
                    'color-mix(in srgb, transparent, var(--tblr-red) 100%)'
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
        });

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
