
@php
    if (Route::is('admin.user.account.faculty.index')) {
        $id = $user->id;
    } else {
        $id = $facultyMem->id;
    }
@endphp
<div class="modal fade" id="edit{{ $id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">
                    @if (Route::is('admin.user.account.faculty.index'))
                        Reset Password
                    @else
                        Edit Information
                    @endif
                </h5>

            </div>

            @if (Route::is('admin.user.account.faculty.index'))
                <form action="{{ route('admin.user.account.faculty.resetPassword', ['id' => $user->id]) }}" method="POST">
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
                <form action="{{ route('admin.user.information.faculty.update', ['id' => $facultyMem->id]) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $facultyMem->first_name }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="last_name" class="form-label fw-bold text-black">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $facultyMem->last_name }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email" class="form-label fw-bold text-black">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $facultyMem->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="phone" class="form-label fw-bold text-black">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $facultyMem->phone }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="department_id" class="form-label fw-bold text-black">Department</label>
                                <select class="form-select" id="department_id" name="department_id">
                                    <option selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option
                                            value="{{ $department->id }}"@if ($department->id == $facultyMem->department_id) selected @endif>
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
                            <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                        </div>
                </form>
            @endif
        </div>
    </div>
</div>
