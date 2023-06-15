<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">
                    @if (Route::is('admin.user.account.faculty.index'))
                        Add Account
                    @else
                        Add Faculty Member
                    @endif
                </h5>

            </div>

            @if (Route::is('admin.user.account.faculty.index'))
                <form action="{{ route('admin.user.account.faculty.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="row mb-3">
                            <label class="form-label fw-bold text-black">Faculty Member</label>
                            <div class="col-12">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected="">Select Faculty</option>
                                    @foreach ($facultyMembers as $facultyMember)
                                        <option value="{{ $facultyMember->id }}">
                                            {{ $facultyMember->getFullName() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="password" class="form-label fw-bold text-black">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="alert alert-danger mt-2" role="alert" id="alert-password">

                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label fw-bold text-black">Confirm
                                    Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="alert alert-danger mt-2" role="alert" id="alert-password_confirmation">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit-e" class="btn btn-primary">Reset
                            Password</button>
                    </div>
                </form>
            @else
                <form action="{{ route('admin.user.information.faculty.update', ['id' => $user->id]) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="first_name" class="form-label fw-bold text-black">First
                                    Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $user->facultyMember->first_name }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="last_name" class="form-label fw-bold text-black">Last
                                    Name</label>
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
                            <div class="col-12">
                                <label for="department" class="form-label fw-bold text-black">Department</label>
                                <select class="form-select" id="department" name="department">
                                    <option selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option
                                            value="{{ $department->id }}"@if ($department->id == $user->facultyMember->department_id) selected @endif>
                                            {{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="submit-e" class="btn btn-primary">Save
                                Changes</button>
                        </div>
                </form>
            @endif
        </div>
    </div>
</div>
