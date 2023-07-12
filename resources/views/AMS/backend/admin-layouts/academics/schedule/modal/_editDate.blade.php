<div class="modal fade" id="editDate{{ $date->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Date</h5>

            </div>
            <form action="{{ route('admin.academic.schedule.update', ['id' => $date->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="start_time" class="form-label fw-bold text-black">Start Time</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                id="start_time" name="start_time" value="{{ $date->start_time }}">
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="end_time" class="form-label fw-bold text-black">End Time</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                id="end_time" name="end_time" value="{{ $date->end_time }}">
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="date" class="form-label fw-bold text-black">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                id="date" name="date" value="{{ $date->date }}">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
