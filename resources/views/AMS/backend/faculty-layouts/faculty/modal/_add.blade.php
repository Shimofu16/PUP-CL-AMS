<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add faculty</h5>

            </div>
            <form action="{{ route('faculty.faculty.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" name="first_name" id="first_name"
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
                                value="{{ old('last_name') }}" name="last_name" id="last_name" placeholder="Last Name">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email" class="form-label fw-bold text-black">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="phone" class="form-label fw-bold text-black">Phone No.</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" name="phone" id="phone" placeholder="phone">
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
                                <option selected value="">----Select Department----</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">
                                        {{ $department->department_name }}</option>
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
