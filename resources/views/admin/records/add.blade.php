<div class="modal" id="addRecord" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Borrow an Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('records.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">User</label>
              <select name="user_id" class="form-select" required>
                <option value="">Select a user</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Item</label>
              <select name="item_id" class="form-select" required>
                <option value="">Select an item</option>
                @foreach($items as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Quantity</label>
              <input type="number" class="form-control" name="quantity" min="1" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Due Date</label>
              <input type="date" class="form-control" name="due_date" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Reason</label>
              <textarea class="form-control" name="reason" rows="3" required></textarea>
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