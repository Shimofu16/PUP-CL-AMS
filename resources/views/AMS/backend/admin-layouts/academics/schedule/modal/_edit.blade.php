<div class="modal fade" id="edit{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Schedule</h5>

            </div>
            <form action="{{ route('admin.academic.schedule.update', ['id' => $schedule->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Teacher</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="teacher_id"
                                name="teacher_id">
                                <option selected value="{{ $schedule->teacher_id }}">
                                    {{ $schedule->teacher->getFullName() }}</option>
                                @foreach ($teachers as $teacher)
                                    @if ($teacher->id != $schedule->teacher_id)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->getFullName() }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Subject</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="subject_id"
                                name="subject_id">
                                <option selected value="{{ $schedule->subject_id }}">
                                    {{ $schedule->subject->subject_name }}</option>
                                @foreach ($subjects as $subject)
                                    @if ($subject->id != $schedule->subject_id)
                                        <option value="{{ $subject->id }}">
                                            {{ $subject->subject_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Section</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="section_id"
                                name="section_id">
                                <option value=""> Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"
                                        @if ($section->id === $schedule->section_id) selected @endif>
                                        {{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="date_sched" class="form-label fw-bold text-black">Date</label>
                            <input type="date" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ $schedule->date }}" name="date" id="date_sched" placeholder="Start">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="semester_id" class="form-label fw-bold text-black">Semester</label>
                            <select class="form-control" id="semester_id" name="semester_id" required>
                                <option value="">Select</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"
                                        @if ($semester->id === $schedule->semester_id) selected @endif>{{ $semester->name }}
                                    </option>
                                @endforeach
                            </select>
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
                                value="{{ $schedule->end_time }}" name="end_time" id="end_time"
                                placeholder="end_time">
                            @error('end_time')
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
