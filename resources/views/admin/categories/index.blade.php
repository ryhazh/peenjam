@extends('layouts.admin')
@section('content')
    {{-- <div>
        @foreach ($categories as $category)
            <p>{{$category->name}}</p>
        @endforeach
    </div> --}}

    @include('admin.categories.add')

    @foreach ($categories as $category)
        @include('admin.categories.delete')
        @include('admin.categories.update')
    @endforeach

    <div class="d-flex align-items-center justify-content-between mb-5">
        <div class="text-center">
            <h1 class="mb-0">Categories</h1>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-primary ms-3"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg> Add Category</button>
    </div>

    <div class="card">

        <div class="p-3">
            {{-- Updated action to categories.index and placeholder --}}
            <form id="filterForm" action="{{ route('categories.index') }}" method="GET"
                class="d-none d-md-flex align-items-center justify-content-between gap-2">
                <!-- Desktop layout -->
                <div class="d-flex align-items-center gap-2">
                    <div class="form-selectgroup">
                        <!-- Your status radio buttons here (same as before) -->
                    </div>
                    <div class="input-icon">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search by category name..." /> {{-- Updated placeholder --}}
                        <span class="input-icon-addon">
                            <!-- search icon -->
                        </span>
                    </div>

                </div>
            </form>

            {{-- Updated action to categories.index and placeholder --}}
            <form action="{{ route('categories.index') }}" method="GET" class="d-flex d-md-none flex-column gap-2">
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


        <div class="table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th class="ps-4">Name</th> {{-- Updated to Name --}}
                        <th class="w-1 pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="ps-4">{{ $category->name }}</td>
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
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#updateCategory{{ $category->id }}">
                                            Edit
                                        </a>

                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#deleteCategory{{ $category->id }}" href="#">Delete</a>
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
                <p class="m-0 text-secondary">Showing {{ $categories->firstItem() ?? 0 }} to
                    {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} entries</p> {{-- Updated text --}}
                {{ $categories->appends(request()->query())->links('vendor.tabler-pagination') }} {{-- Updated variable --}}
            </div>
        </div>
    </div>
@endsection
