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
                        <input type="text" value="{{ old('name', $user->name) }}" class="form-control" name="name"
                            required>
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
