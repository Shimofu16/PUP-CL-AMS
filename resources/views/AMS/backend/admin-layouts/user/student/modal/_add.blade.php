<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add {{ $pageTitle }}</h5>

            </div>
            @if (Route::is('admin.user.account.student.index'))
            @else
                <form action="{{ route('admin.user.information.student.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="student_no" class="form-label fw-bold">Student Number:</label>
                                <input type="text" class="form-control" id="student_no" name="student_no" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="first_name" class="form-label fw-bold">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="col-6">
                                <label for="last_name" class="form-label fw-bold">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="email" class="form-label fw-bold">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-6">
                                <label for="phone" class="form-label fw-bold">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="address" class="form-label fw-bold">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="date_of_birth" class="form-label fw-bold">Date of Birth:</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="gender" class="form-label fw-bold">Gender:</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="section_id" class="form-label fw-bold">Section:</label>
                                <select class="form-control" id="section_id" name="section_id" required>
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" id="submit" class="btn btn-maroon">Add</button>
        </div>
        </form>
        @endif
    </div>
</div>
</div>
