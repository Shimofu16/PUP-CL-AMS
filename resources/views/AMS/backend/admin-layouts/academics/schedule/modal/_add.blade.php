<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Schedule</h5>

            </div>
            <form action="{{ route('admin.academic.schedule.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Teacher</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="teacher_id"
                                name="teacher_id">
                                <option selected value="">----Select Teacher----</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->getFullName() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Subject</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="subject_id"
                                name="subject_id">
                                <option selected value="">----Select Subject----</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Section</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="section_id"
                                name="section_id">
                                <option selected value="">----Select Section----</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">
                                        {{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="date_sched" class="form-label fw-bold text-black">Date</label>
                            <input type="date" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ old('date') }}" name="date" id="date_sched"
                                placeholder="Start">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_time" class="form-label fw-bold text-black">Start</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ old('start_time') }}" name="start_time" id="start_time"
                                placeholder="Start">
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="end_time" class="form-label fw-bold text-black">End</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                value="{{ old('end_time') }}" name="end_time" id="end_time"
                                placeholder="end_time">
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-maroon">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
