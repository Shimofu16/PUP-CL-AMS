<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Course</h5>

            </div>
            <form action="{{ route('faculty.academic.course.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="display_name" class="form-label fw-bold text-black">Course Code</label>
                            <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                                value="{{ old('course_code') }}" name="course_code" id="course_code"
                                placeholder="Course Code">
                            @error('course_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="display_name" class="form-label fw-bold text-black">Course Name</label>
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror"
                                value="{{ old('display_name') }}" name="display_name" id="display_name"
                                placeholder="Display Name">
                            @error('display_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label fw-bold text-black">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                value="{{ old('description') }}" name="description" id="description"
                                placeholder="Description">
                            @error('description')
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
