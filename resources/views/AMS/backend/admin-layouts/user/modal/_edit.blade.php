<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Change Password</h5>

            </div>
            @if (Route::is('admin.user.*.show'))
                @if (Route::is('admin.user.faculty.show'))
                    @php
                        $route = route('admin.user.faculty.edit', $user->faculty_member_id);
                    @endphp
                    <form action="{{ $route }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ $user->facultyMember->first_name }}">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="last_name" class="form-label fw-bold text-black">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ $user->facultyMember->last_name }}">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="email" class="form-label fw-bold text-black">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->facultyMember->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="phone" class="form-label fw-bold text-black">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $user->facultyMember->phone }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="form-label fw-bold text-black">Department</label>
                                <div class="col-12">
                                    <select class="form-select" aria-label="Default select example" id="department_id"
                                        name="department_id">
                                        <option selected value="{{ $user->facultyMember->id }}">
                                            {{ $user->facultyMember->department->department_name }}</option>
                                        @foreach ($departments as $department)
                                            @if ($user->facultyMember->department->id != $department->id)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->department_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                @endif
                @if (Route::is('admin.user.student.show'))
                    @php
                        $route = route('admin.user.student.edit', $user->student_id);
                    @endphp
                    <form action="{{ $route }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="student_no" class="form-label fw-bold text-black">Student No.</label>
                                    <input type="text" class="form-control" id="student_no" name="student_no"
                                        value="{{ $user->student->student_no }}">
                                    @error('student_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ $user->student->first_name }}">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="last_name" class="form-label fw-bold text-black">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ $user->student->last_name }}">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="email" class="form-label fw-bold text-black">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->student->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="phone" class="form-label fw-bold text-black">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $user->student->phone }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="address" class="form-label fw-bold text-black">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $user->student->address }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="date_of_birth" class="form-label fw-bold text-black">Date of birth</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        value="{{ $user->student->date_of_birth }}">
                                    @error('date_of_birth')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="gender" class="form-label fw-bold text-black">Gender</label>
                                    <input type="text" class="form-control" id="gender" name="gender"
                                        value="{{ $user->student->gender }}">
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                @endif

            @endif
            @if (Route::is('admin.user.*.index'))
                @if (Route::is('admin.user.faculty.index'))
                    @php
                        $route = route('admin.user.faculty.update', $user->id);
                    @endphp
                @endif
                @if (Route::is('admin.user.student.index'))
                    @php
                        $route = route('admin.user.student.update', $user->id);
                    @endphp
                @endif
                <form action="{{ $route }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="password-e" class="form-label fw-bold text-black">Password</label>
                                <input type="password" class="form-control" id="password-e" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="alert alert-danger mt-2" role="alert" id="alert-password-e">

                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="password_confirmation-e" class="form-label fw-bold text-black">Confirm
                                    Password</label>
                                <input type="password" class="form-control" id="password_confirmation-e"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="alert alert-danger mt-2" role="alert"
                                    id="alert-password_confirmation-e">

                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show-e">
                                    <label class="form-check-label fw-bold text-black" for="show-e">Show
                                        Password</label>
                                </div>
                            </div>
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
