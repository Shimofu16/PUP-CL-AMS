<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add {{ $pageTitle }}</h5>

            </div>
            @if (Route::is('admin.user.faculty.index'))
                @php
                    $route = route('admin.user.faculty.store');
                @endphp
            @endif
            @if (Route::is('admin.user.student.index'))
                @php
                    $route = route('admin.user.student.store');
                @endphp
            @endif
            <form action="{{ $route }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="form-label fw-bold text-black">Select</label>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="show">
                                <label class="form-check-label  fw-bold text-black" for="show">Show Password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit" class="btn btn-maroon">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
