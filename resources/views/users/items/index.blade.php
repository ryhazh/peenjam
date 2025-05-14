@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="text-center">
                <h1 class="mb-0">Items</h1>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-primary ms-3"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>Add Item</button>
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

                    </div>
                </form>

                <form action="{{ route('records.index') }}" method="GET" class="d-flex d-md-none flex-column gap-2">
                    <!-- Mobile layout -->
                    <div class="dropdown">
                        <a href="#" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                            {{ ucfirst(request('status', 'all')) }}
                        </a>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="input-icon">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search..." />
                            <span class="input-icon-addon">
                                <!-- search icon -->
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-resposive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="ps-4">Name Item</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th class="w-1 pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="ps-4">{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->quantity }}</td>
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
                                                data-bs-target="#deleteItem{{ $item->id }}" href="#">Delete</a>
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
                    <p class="m-0 text-secondary">Showing {{ $items->firstItem() ?? 0 }} to
                        {{ $items->lastItem() ?? 0 }} of {{ $items->total() }} entries
                    </p>
                    {{ $items->appends(request()->query())->links('vendor.tabler-pagination') }}
                </div>
            </div>
        </div>
    @endsection
