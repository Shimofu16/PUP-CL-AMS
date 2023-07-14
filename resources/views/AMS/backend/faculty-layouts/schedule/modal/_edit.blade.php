<div class="modal fade" id="edit{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Request a Schedule</h5>

            </div>
            <form action="{{ route('faculty.schedule.reschedule') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="date_id" class="form-label fw-bold text-black">Old Date</label>
                            {{-- generate aselect for scheduled dates --}}
                            <select class="form-select" aria-label="Default select example" name="date_id" id="date_id">
                                <option value="" selected>----- Select Date -----</option>
                                @foreach ($schedule->scheduleDates as $date)
                                    @if ($date->date > now()->subDay()->format('Y-m-d'))
                                    <option value="{{ $date->id }}">{{ date('F d, Y', strtotime($date->date)) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="new_date" class="form-label fw-bold text-black">New Date</label>
                            <input type="date" class="form-control  @error('new_date') is-invalid @enderror"
                                name="new_date" id="new_date" placeholder="Start">
                            @error('new_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_time" class="form-label fw-bold text-black">Start</label>
                            <input type="time" class="form-control  @error('start_time') is-invalid @enderror"
                                name="start_time" id="start_time">
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="end_time" class="form-label fw-bold text-black">End</label>
                            <input type="time" class="form-control  @error('end_time') is-invalid @enderror"
                                name="end_time" id="end_time">
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="reason" class="form-label fw-bold text-black">Reason</label>
                            <textarea class="form-control  @error('reason') is-invalid @enderror" 
                                name="reason" id="reason" cols="30" rows="10">{{ old('reason') }}</textarea>
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
