@php
    if (Route::is('admin.user.account.student.index')) {
        $id = $user->id;
    } else {
        $id = $student->id;
    }
@endphp
<div class="modal fade" id="edit{{ $id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">
                    @if (Route::is('admin.user.account.student.index'))
                        Reset Password
                    @else
                        Edit Information
                    @endif
                </h5>

            </div>

            @if (Route::is('admin.user.account.student.index'))
                <form action="{{ route('admin.user.account.student.resetPassword', ['id' => $user->id]) }}"
                    method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        Are you sure you want to reset {{ $user->getName() }}'s password?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit-e" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            @else
                <form action="{{ route('admin.user.information.student.update', ['id' => $student->id]) }}"
                    method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="student_no" class="form-label fw-bold text-black">Student No.</label>
                                <input type="text" class="form-control" id="student_no" name="student_no"
                                    value="{{ $student->student_no }}">
                                @error('student_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $student->first_name }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="last_name" class="form-label fw-bold text-black">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $student->last_name }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email" class="form-label fw-bold text-black">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $student->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="phone" class="form-label fw-bold text-black">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $student->phone }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="address" class="form-label fw-bold text-black">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $student->address }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="date_of_birth" class="form-label fw-bold text-black">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    value="{{ $student->date_of_birth }}">
                                @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="gender" class="form-label fw-bold">Gender:</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" @if ($student->gender === "Male") selected @endif>Male</option>
                                    <option value="Female" @if ($student->gender === "Female") selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="section_id" class="form-label fw-bold">Section:</label>
                                <select class="form-control" id="section_id" name="section_id" required>
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                        <option
                                            value="{{ $section->id }}"@if ($section->id == $student->section_id) selected @endif>
                                            {{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                        </div>
                </form>
            @endif
        </div>
    </div>
</div>
