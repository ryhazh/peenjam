@section('content')
    <div class="container-fluid py-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
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
                            <p class="mb-0">Item Types</p>
                        </div>
                        <h1 class="mb-0">{{ $itemTypeCount }}</h1>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-list">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 12l.01 0" />
                                <path d="M13 12l2 0" />
                                <path d="M9 16l.01 0" />
                                <path d="M13 16l2 0" />
                            </svg>
                            <p class="mb-0">Total Loan Records</p>
                        </div>
                        <h1 class="mb-0">{{ $totalRecordCount }}</h1>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-hourglass-high">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6.5 7h11" />
                                <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z" />
                                <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z" />
                            </svg>
                            <p class="mb-0">Pending Loans (Out)</p>
                        </div>
                        <h1 class="mb-0">{{ $pendingUnreturnedCount }}</h1>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                            <p class="mb-0">Rejected Loans (Out)</p>
                        </div>
                        <h1 class="mb-0">{{ $rejectedUnreturnedCount }}</h1>
                    </div>

                    {{-- All other metric cards have been removed --}}

                </div>
            </div>
        </div>

        {{-- Quick Actions Panel --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ url('/items/create') }}" class="btn btn-primary d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package-add"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5v-9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 11h3m-1.5 -1.5v3" /></svg>
                                Add New Item
                            </a>
                            <a href="{{ url('/users/create') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                                Add New User
                            </a>
                            <a href="{{ url('/records/create') }}" class="btn btn-info d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                Create New Loan
                            </a>
                            <a href="{{ url('/records?status=pending') }}" class="btn btn-warning d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-checklist"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.615 19h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" /><path d="M14 19l2 2l4 -4" /><path d="M9 11l.01 0" /><path d="M9 7l.01 0" /><path d="M9 15l.01 0" /></svg>
                                Review Pending ({{ $pendingUnreturnedCount }})
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
