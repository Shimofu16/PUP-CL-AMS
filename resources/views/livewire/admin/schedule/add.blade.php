<div class="modal-content">
    <div class="modal-header bg-maroon">
        <h5 class="modal-title text-white">Add Schedule</h5>
    </div>
    <form wire:submit.prevent="store">
        <div class="modal-body">
            @csrf
            <div class="row mb-3">
                <label class="form-label fw-bold text-black">Teacher</label>
                <div class="col-12">
                    <select class="form-select" aria-label="Default select example" wire:model="teacher_id">
                        <option selected value="">----Select Teacher----</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->getFullName() }}</option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label fw-bold text-black">Subject</label>
                <div class="col-12">
                    <select class="form-select" aria-label="Default select example" wire:model="subject_id">
                        <option selected value="">----Select Subject----</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label fw-bold text-black">Section</label>
                <div class="col-12">
                    <select class="form-select" aria-label="Default select example" wire:model="section_id">
                        <option selected value="">----Select Section----</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="start_date" class="form-label fw-bold text-black">Start Date</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                        wire:model="start_date" id="start_date" placeholder="Start">
                    @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="end_date" class="form-label fw-bold text-black">End Date</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                        wire:model="end_date" id="end_date" placeholder="end_date">
                    @error('end_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="start_time" class="form-label fw-bold text-black">Start Time</label>
                    <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                        wire:model="start_time" id="start_time" placeholder="Start">
                    @error('start_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="end_time" class="form-label fw-bold text-black">End Time</label>
                    <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                        wire:model="end_time" id="end_time" placeholder="end_time">
                    @error('end_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="day" class="form-label fw-bold text-black">Day</label>
                    <select class="form-select" aria-label="Default select example" wire:model="day">
                        <option value="">----Select Day----</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                    @error('day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label fw-bold text-black">Selected Days:</label>
                    <ul>
                        @foreach ($days as $key => $selectedDay)
                            <li wire:click='removeDay({{ $key }})'>{{ $selectedDay }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="semester_id" class="form-label fw-bold text-black">Semester</label>
                    <select class="form-select" wire:model="semester_id" required>
                        <option value="">----Select Semester----</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endforeach
                    </select>
                    @error('semester_id')
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
