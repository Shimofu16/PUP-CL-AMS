<div class="modal fade" id="edit{{ $faculty->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit faculty</h5>

            </div>
            <form action="{{ route('faculty.faculty.update', ['id' => $faculty->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ $faculty->first_name }}" name="first_name" id="first_name"
                                placeholder="First Name">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="last_name" class="form-label fw-bold text-black">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ $faculty->last_name }}" name="last_name" id="last_name"
                                placeholder="Last Name">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email" class="form-label fw-bold text-black">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $faculty->email }}" name="email" id="email" placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="phone" class="form-label fw-bold text-black">Phone No.</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ $faculty->phone }}" name="phone" id="phone" placeholder="phone">
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
                                <option selected value="{{ $faculty->department_id }}">
                                    {{ $faculty->department->department_name }}</option>
                                @foreach ($departments as $department)
                                    @if ($department->id != $faculty->department_id)
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
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
