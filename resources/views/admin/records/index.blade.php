@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('admin.records.add')

        @foreach ($records as $record)
            @include('admin.records.delete')
        @endforeach
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="text-center">
                <h1 class="mb-0">Records</h1>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#addRecord" class="btn btn-primary ms-3"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg> Borrow an Item</button>
        </div>

        <div class="card">

            <div class="p-3">
                <form id="filterForm" action="{{ route('records.index') }}" method="GET"
                    class="d-none d-md-flex align-items-center justify-content-between gap-2">
                    <!-- Desktop layout -->
                    <div class="d-flex align-items-center gap-2">
                        <div class="form-selectgroup">
                            <!-- Your status radio buttons here (same as before) -->
                        </div>
                        <div class="input-icon">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search by username..." />
                            <span class="input-icon-addon">
                                <!-- search icon -->
                            </span>
                        </div>
                        <select name="filter" id="filter" class="btn text-start ps-2" onchange="this.form.submit()">
                            <option value="7" {{ request('filter') === '7' ? 'selected' : '' }}>
                                Last 7 days</option>
                            <option value="31" {{ request('filter') === '31' ? 'selected' : '' }}>
                                Last 31 days</option>
                            <option value="3" {{ request('filter') === '3' ? 'selected' : '' }}>
                                Last 3 months</option>
                            <option value="all" {{ request('filter', 'all') === 'all' ? 'selected' : '' }}>All</option>
                        </select>
                    </div>
                </form>

                <form action="{{ route('records.index') }}" method="GET" class="d-flex d-md-none flex-column gap-2">
                    <!-- Mobile layout -->
                    <div class="dropdown">
                        <a href="#" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                            {{ ucfirst(request('status', 'all')) }}
                        </a>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" type="submit" name="status" value="all">All</button>
                            <button class="dropdown-item" type="submit" name="status" value="borrowed">Borrowed</button>
                            <button class="dropdown-item" type="submit" name="status" value="overdue">Overdue</button>
                            <button class="dropdown-item" type="submit" name="status" value="returned">Returned</button>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="input-icon">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search..." />
                            <span class="input-icon-addon">
                                <!-- search icon -->
                            </span>
                        </div>

                        <select name="filter" id="filter" class="form-select " onchange="this.form.submit()">
                            <option value="7" {{ request('filter') === '7' ? 'selected' : '' }}>
                                < 7 days</option>
                            <option value="31" {{ request('filter') === '31' ? 'selected' : '' }}>
                                < 31 days</option>
                            <option value="3" {{ request('filter') === '3' ? 'selected' : '' }}>
                                < 3 months</option>
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
                            <th>Status</th>
                            <th class="w-1 pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td class="ps-4">{{ $record->id }}</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ $record->item->name }}</td>
                                <td>{{ $record->quantity }}</td>
                                <td>{{ $record->borrowed_at }}</td>
                                <td>{{ $record->reason }}</td>
                                <td>{{ $record->due_date }}</td>
                                <td class="pe-4">
                                    <span
                                        class="badge bg-{{ $record->status === 'Returned' ? 'green' : ($record->status === 'Overdue' ? 'red' : 'yellow') }}-lt">
                                        {{ $record->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            </svg></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteRecord{{ $record->id }}"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer px-4 py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="m-0 text-secondary">Showing {{ $records->firstItem() ?? 0 }} to
                        {{ $records->lastItem() ?? 0 }} of {{ $records->total() }} entries</p>
                    {{ $records->appends(request()->query())->links('vendor.tabler-pagination') }}
                </div>
            </div>
        </div>

    </div>
@endsection
