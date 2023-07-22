<div class="modal fade" id="edit{{ $schedule->id }}" tabindex="-1" aria-labelledby="take-attendance" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="take-attendance">{{ $schedule->subject->subject_name }}</h5>
            </div>

            @if ($schedule->checkifStudentHasTimeIn())
                <form action="{{ route('student.attendance.destroy', ['id' => $schedule->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Time out 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Time out</button>
                    </div>
                </form>
            @elseif ($schedule->checkIfStudentAlreadyHasAttendance())
                <div class="modal-body ">
                    You already have attendance for this subject. :)
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            @else
                <form action="{{ route('student.attendance.update', ['id' => $schedule->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        {{-- generate a select of computers --}}
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="computer" class="form-label">Computer</label>
                                <select class="form-select" aria-label="Default select example" name="computer_id"
                                    required>
                                    <option selected disabled>Select Computer</option>
                                    @foreach ($computers as $computer)
                                        @if ($computer->getStatus() == 'Working' && !$computer->isActive())
                                            <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Time in</button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
