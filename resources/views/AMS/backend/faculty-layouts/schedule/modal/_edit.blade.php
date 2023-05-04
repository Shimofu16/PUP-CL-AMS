<div class="modal fade" id="edit{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Schedule</h5>

            </div>
            <form action="{{ route('faculty.schedule.update', ['id' => $schedule->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="date_sched" class="form-label fw-bold text-black">Date</label>
                            <input type="date" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ $schedule->date }}" name="date" id="date_sched" placeholder="Start">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_time" class="form-label fw-bold text-black">Start</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ $schedule->start_time }}" name="start_time" id="start_time"
                                placeholder="Start">
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="end_time" class="form-label fw-bold text-black">End</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                value="{{ $schedule->end_time }}" name="end_time" id="end_time" placeholder="end_time">
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="reason" class="form-label fw-bold text-black">Reason</label>
                            <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason" cols="30"
                                rows="10">{{ old('reason') }}</textarea>
                            @error('reason')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
