<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Section</h5>

            </div>
            <form action="{{ route('faculty.academic.section.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="section_name" class="form-label fw-bold text-black">Section Name</label>
                            <input type="text" class="form-control @error('section_name') is-invalid @enderror"
                                value="{{ old('section_name') }}" name="section_name" id="section_name"
                                placeholder="Section Name">
                            @error('section_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Course</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example" id="course_id"
                                name="course_id">
                                <option selected value="">----Select Course----</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->course_code }}</option>
                                @endforeach
                            </select>
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
