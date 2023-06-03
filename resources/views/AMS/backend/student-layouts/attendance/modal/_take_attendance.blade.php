<div class="modal fade" id="edit{{ $schedule->id }}" tabindex="-1" aria-labelledby="take-attendance" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="take-attendance">Take Attendance for
                    {{ $schedule->subject->subject_name }}</h5>
            </div>

            <form action="{{ route('student.attendance.update', ['id' => $schedule->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- generate a select of computers --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="computer" class="form-label">Computer</label>
                            <select class="form-select" aria-label="Default select example" name="computer_id" required>
                                <option selected disabled>Select Computer</option>
                                @foreach ($computers as $computer)
                                    <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            {{-- genarrate a select for status with options of working and not working --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="status" required>
                                    <option selected disabled>Select Status</option>
                                    <option value="Working">Working</option>
                                    <option value="Not Working">Not Working</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Take Attendance</button>
                </div>
            </form>

        </div>
    </div>
</div>
