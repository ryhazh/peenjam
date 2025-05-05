<div class="modal" id="updateRecord{{ $record->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit a Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('records.update', $record->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">User</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">Select a user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id === $record->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Item</label>
                        <select name="item_id" class="form-select" required>
                            <option value="">Select an item</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id === $record->item_id ? 'selected' : '' }}
                                    {{ $item->quantity < 1 ? 'disabled' : '' }}>
                                    {{ $item->name }} ({{ $item->quantity }} available)</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" min="1"
                            value="{{ $record->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date" value="{{ $record->due_date }}"
                            required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <textarea class="form-control" name="reason" rows="3" required>{{ $record->reason }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="returned" value="1"
                                {{ $record->returned_at ? 'checked' : '' }}>
                            <span class="form-check-label">Mark as Returned</span>
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
