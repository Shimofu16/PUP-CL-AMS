
    @extends('AMS.backend.'.Auth::user()->role->name.'-layouts.sidebar')

@section('page-title')
     Change password
@endsection
@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        </a>
                    </div>
                    <form action="{{ route(Auth::user()->role->name.'.change-password.update') }}" method="post">
                        <div class="card-body">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="current_password" class="font-weight-bold">Current Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    id="current_password" name="current_password" value="{{ old('current_password') }}">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="new_password" class="font-weight-bold">New Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    id="new_password" name="new_password" value="{{ old('new_password') }}">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="confirm_password" class="font-weight-bold">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                    id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="show-password">
                                <label class="form-check-label" for="show-password">
                                    Show Passwords
                                </label>
                            </div>

                        </div>
                        <div class="card-footer border-0 bg-transparent d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        //show password using jquery
        $(document).ready(function() {
            $('#show-password').click(function() {
                if ($(this).is(':checked')) {
                    $('#current_password').attr('type', 'text');
                    $('#new_password').attr('type', 'text');
                    $('#confirm_password').attr('type', 'text');
                } else {
                    $('#current_password').attr('type', 'password');
                    $('#new_password').attr('type', 'password');
                    $('#confirm_password').attr('type', 'password');
                }
            });
        });
    </script>

@endsection
