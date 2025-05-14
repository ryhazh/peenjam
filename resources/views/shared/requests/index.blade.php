@extends('layouts.admin')
@section('content')
    <div class="container">

        @foreach ($requests as $request)
            @include('admin.requests.reject')
            @include('admin.requests.accept')
        @endforeach

        @include('shared.requests.add')

        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="text-center">
                <h1 class="mb-0">Requests</h1>
            </div>
            @if (isset($user->role) && $user->role->name === 'user')
                <button data-bs-toggle="modal" data-bs-target="#newRequest" class="btn btn-primary ms-3"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg> Request to Borrow</button>
            @endif
        </div>

        <div class="card">
            <div class="p-3">
                {{-- Desktop Layout --}}
                <form id="filterForm" action="{{ route('requests.index') }}" method="GET"
                    class="d-none d-md-flex align-items-center justify-content-between gap-2 flex-wrap">

                    <div class="d-flex align-items-center gap-2 flex-nowrap">
                        {{-- Search Input --}}
                        <div class="input-icon">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search by username..." style="min-width: 220px;" />
                        </div>

                        {{-- Filter by Days --}}
                        <select name="filter" id="filter" class="form-select" onchange="this.form.submit()">
                            <option value="7" {{ request('filter') === '7' ? 'selected' : '' }}>Last 7 days</option>
                            <option value="31" {{ request('filter') === '31' ? 'selected' : '' }}>Last 31 days</option>
                            <option value="3" {{ request('filter') === '3' ? 'selected' : '' }}>Last 3 months</option>
                            <option value="all" {{ request('filter', 'all') === 'all' ? 'selected' : '' }}>All</option>
                        </select>
                    </div>

                    {{-- Filter by Status --}}
                    <div>
                        <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                            <option value="all" {{ request('status', 'all') === 'all' ? 'selected' : '' }}>All</option>
                            <option value="pending" {{ request('status', 'pending') === 'pending' ? 'selected' : '' }}>
                                Pending</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected
                            </option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved
                            </option>
                        </select>
                    </div>
                </form>

                {{-- Mobile Layout --}}
                <form action="{{ route('requests.index') }}" method="GET"
                    class="d-flex d-md-none flex-column gap-2 mt-2">

                    {{-- Status Dropdown --}}
                    <div class="dropdown">
                        <a href="#" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                            {{ ucfirst(request('status', 'all')) }}
                        </a>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" type="submit" name="status" value="all">All</button>
                            <button class="dropdown-item" type="submit" name="status" value="pending">Pending</button>
                            <button class="dropdown-item" type="submit" name="status" value="rejected">Rejected</button>
                            <button class="dropdown-item" type="submit" name="status" value="approved">Approved</button>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        {{-- Search Input --}}
                        <div class="input-icon flex-fill">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search..." />
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                        </div>

                        {{-- Filter by Days --}}
                        <select name="filter" id="filter" class="form-select" onchange="this.form.submit()">
                            <option value="7" {{ request('filter') === '7' ? 'selected' : '' }}>7 days</option>
                            <option value="31" {{ request('filter') === '31' ? 'selected' : '' }}>31 days</option>
                            <option value="3" {{ request('filter') === '3' ? 'selected' : '' }}>3 months</option>
                            <option value="all" {{ request('filter', 'all') === 'all' ? 'selected' : '' }}>All</option>
                        </select>
                    </div>
                </form>
            </div>


            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Username</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Borrowed At</th>
                            <th>Reason</th>
                            <th>Due Date</th>
                            @if (isset($user->role))
                                @if ($user->role->name === 'user')
                                    <th class="w-1 pe-4">Status</th>
                                @elseif (in_array($user->role->name, ['admin', 'staff']))
                                    <th class="w-1">Status</th>
                                    <th class="w-1 pe-4">Action</th>
                                @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                            <tr>
                                <td class="ps-4">{{ $request->id }}</td>
                                <td>{{ $request->user->name }}</td>
                                <td>{{ $request->item->name }}</td>
                                <td>{{ $request->quantity }}</td>
                                <td>{{ $request->borrowed_at }}</td>
                                <td>{{ $request->reason }}</td>
                                <td>{{ $request->due_date }}</td>
                                <td class="pe-4">
                                    <span
                                        class="badge bg-{{ $request->is_approved === 'Pending'
                                            ? 'indigo'
                                            : ($request->is_approved === 'Rejected'
                                                ? 'red'
                                                : ($request->is_approved === 'Approved'
                                                    ? 'green'
                                                    : '')) }}-lt">
                                        {{ $request->is_approved }}
                                        @if ($request->is_approved === 'Pending' || 'Rejected')
                                            <span data-bs-trigger="hover" class="text-right" data-bs-toggle="popover"
                                                title="Actions by"
                                                data-bs-content="{{ $request->actionUser?->name ?? 'Unknown' }}"
                                                data-bs-placement="top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2">
                                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0m9-3h.01" />
                                                        <path d="M11 12h1v4h1" />
                                                    </g>
                                                </svg>
                                            </span>
                                        @endif
                                    </span>
                                </td>
                                @if (in_array($user->role->name, ['admin', 'staff']))
                                    <td class="d-flex">
                                        <button data-bs-toggle="modal" data-bs-target="#acceptModal{{ $request->id }}"
                                            class="btn btn-pill {{ $request->is_approved === 'Approved' ? 'disabled' : '' }} rounded-end-0 btn-green"
                                            {{ $request->is_approved === 'Approved' ? 'disabled' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m5 12l5 5L20 7" />
                                            </svg>
                                        </button>

                                        <button data-bs-toggle="modal" data-bs-target="#rejectModal{{ $request->id }}"
                                            class="btn btn-pill {{ $request->is_approved === 'Rejected' ? 'disabled' : '' }} rounded-start-0 btn-red"
                                            {{ $request->is_approved === 'Approved' ? 'disabled' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">No requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer px-4 py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="m-0 text-secondary">Showing {{ $requests->firstItem() ?? 0 }} to
                        {{ $requests->lastItem() ?? 0 }} of {{ $requests->total() }} entries</p>
                    {{ $requests->appends(request()->query())->links('vendor.tabler-pagination') }}
                </div>
            </div>
        </div>

    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible position-fixed top-0 end-0 m-3" role="alert"
            style="z-index: 1050; min-width: 300px;">
            <div class="d-flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="alert-title">Success</h4>
                    <div class="text-secondary">{{ session('success') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible position-fixed top-0 end-0 m-3" role="alert"
            style="z-index: 1050; min-width: 300px;">
            <div class="d-flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                </div>
                <div>
                    <h4 class="alert-title">Error</h4>
                    <div class="text-secondary">{{ session('error') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
@endsection
