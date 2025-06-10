<div class="modal" id="addUser" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    {{-- Role Selection (Select Group) --}}
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                {{-- 'User' as the first option and default selected --}}
                                <input type="radio" name="role_id" value="3" class="form-selectgroup-input"
                                    checked />
                                <span class="form-selectgroup-label">User</span>
                            </label>
                            <label class="form-selectgroup-item">
                                {{-- 'Operator' as the second option --}}
                                <input type="radio" name="role_id" value="2" class="form-selectgroup-input" />
                                <span class="form-selectgroup-label">Operator</span>
                            </label>
                            {{-- Add more roles here if needed --}}
                        </div>
                    </div>
                    {{-- End Role Selection --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
