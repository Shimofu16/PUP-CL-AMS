@extends('AMS.frontend.layouts.master')

@section('page-title', 'Register')

@section('contents')
    <form action="{{ route('register.store') }}" method="POST" class="text-start">
        @csrf
        @method('POST')
        <div class="card-body py-1" id="first-page">
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
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
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
        <div class="card-body py-1" id="second-page">
            <div class="row mb-3">
                <div class="col-12">
                    <label for="password" class="form-label fw-bold text-maroon">Password</label>
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
                    <label for="password_confirmation" class="form-label fw-bold text-maroon">Confirm
                        Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
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
                        <label class="form-check-label  fw-bold text-maroon" for="show">Show Password</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex flex-column mb-3">
            <button type="submit" class="btn btn-maroon mb-1" id="register">Register</button>
            <button type="button" class="btn btn-maroon mb-1" id="next">Next</button>
            <a href="{{ route('home.index') }}" id="home" class="btn btn-outline-maroon text-maroon">
                Home
            </a>
            <button type="button" id="back" class="btn btn-outline-maroon text-maroon">
                back
            </button>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/packages/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>

    {{-- generate a jquesry --}}
    <script>
        $(document).ready(function() {
            /* show the first page and hide all the other pages */
            $('#first-page').show();
            $('#second-page').hide();
            $('#next').show();
            $('#home').show();
            $('#back').hide();
            $('#register').hide();
            /* when the next button is clicked */
            $('#next').click(function() {
                /* validate the form first before show/hide forms */
                if ($('#first_name').val() == '' || $('#last_name').val() == '' || $('#email').val() ==
                    '' ||
                    $('#phone').val() == '' || $('#address').val() == '' || $('#date_of_birth').val() ==
                    '' ||
                    $('#gender').val() == '' || $('#section_id').val() == '') {
                    alert('Please fill up all fields');
                } else {
                    /* hide the first page and show the second page */
                    $('#first-page').hide();
                    $('#second-page').show();
                    $('#back').show();
                    $('#register').show();
                    $('#home').hide();
                    $('#next').hide();
                }
            });
            /* when the back button is clicked */
            $('#back').click(function() {
                /* hide the second page and show the first page */
                $('#first-page').show();
                $('#second-page').hide();
                $('#next').show();
                $('#home').show();
                $('#back').hide();
                $('#register').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#alert-password').hide();
            $('#alert-password_confirmation').hide();
            $('#show').click(function() {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                    $('#password_confirmation').attr('type', 'text');
                    console.log('checked')
                } else {
                    $('#password').attr('type', 'password');
                    $('#password_confirmation').attr('type', 'password');
                    console.log('uncheked')
                }
            });
            /* check also if the password is 8 characters */
            $('#password').keyup(function() {
                if ($('#password').val()
                    .length >= 8) {
                    $('#password').css('border', '1px solid green');
                    $('#alert-password').hide();
                    $('#submit').prop('disabled', false);
                } else {
                    $('#password').css('border', '1px solid red');
                    $('#alert-password').show();
                    $('#alert-password').text('Password must be 8 characters');
                    $('#submit').prop('disabled', true);
                }
            });
            /* check if the password and confirm password are the same */
            $('#password_confirmation').keyup(function() {
                if ($('#password').val() == $('#password_confirmation').val()) {
                    $('#password_confirmation').css('border', '1px solid green');
                    $('#alert-password_confirmation').hide();
                    if ($('#password').val()
                        .length >= 8) {
                        $('#submit').prop('disabled', false);
                    }
                } else {
                    $('#password_confirmation').css('border', '1px solid red');
                    $('#alert-password_confirmation').show();
                    $('#alert-password_confirmation').text(
                        'Password and Confirm Password must be the same');
                    $('#submit').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
