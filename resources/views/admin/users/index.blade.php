@extends('layouts.admin')
@section('content')
    @include('admin.users.add')

    @foreach ($users as $user)
        {{-- spent like 2hr on this shit, idc abt clean code anym, cant even get it to work, basically the loop always valuating at 1, it doesnt continue at all --}}
        {{-- @include('admin.users.delete')
        @include('admin.users.update') --}}

        <div class="modal" id="deleteUser{{ $user->id }}" tabindex="-1">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path
                                d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
                        <h3>Are you sure?</h3>
                        <div class="text-secondary">
                            Do you really want to delete user <b>{{ $user->name }}</b>? This process cannot be undone.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn w-100" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="updateUser{{ $user->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" value="{{ old('name', $user->name) }}" class="form-control"
                                    name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" value="{{ old('phone', $user->phone) }}" class="form-control"
                                    name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" value="{{ old('email', $user->email) }}" class="form-control"
                                    name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Leave blank to keep current password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="role_id" value="3" class="form-selectgroup-input"
                                            {{ old('role_id', $user->role_id) == 3 ? 'checked' : '' }} />
                                        <span class="form-selectgroup-label">User</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="role_id" value="2" class="form-selectgroup-input"
                                            {{ old('role_id', $user->role_id) == 2 ? 'checked' : '' }} />
                                        <span class="form-selectgroup-label">Operator</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex align-items-center justify-content-between mb-5">
        <div class="text-center">
            <h1 class="mb-0">Users</h1>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-primary ms-3"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg> Add User</button>
    </div>

    <div class="card">

        <div class="p-3">
            {{-- Updated action to users.index --}}
            <form id="filterForm" action="{{ route('users.index') }}" method="GET"
                class="d-none d-md-flex align-items-center justify-content-between gap-2">
                <!-- Desktop layout -->
                <div class="d-flex align-items-center gap-2">
                    <div class="form-selectgroup">
                        {{-- Your status radio buttons here (same as before) --}}
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

            {{-- Updated action to users.index --}}
            <form action="{{ route('users.index') }}" method="GET" class="d-flex d-md-none flex-column gap-2">
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
                        <th class="ps-4">Username</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="w-1 pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="ps-4">{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{$user->role->name}}</td>


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
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#updateUser{{ $user->id }}">Edit</a>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#deleteUser{{ $user->id }}" href="#">Delete</a>
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
                <p class="m-0 text-secondary">Showing {{ $users->firstItem() ?? 0 }} to
                    {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} entries</p>
                {{ $users->appends(request()->query())->links('vendor.tabler-pagination') }}
            </div>
        </div>
    </div>
@endsection
