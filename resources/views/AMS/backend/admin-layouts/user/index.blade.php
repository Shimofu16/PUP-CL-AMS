@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    {{ $pageTitle }}
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add
                            @yield('page-title')</button>
                        @include('AMS.backend.admin-layouts.user.modal._add')
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="users-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            @if (Route::is('admin.user.faculty.index'))
                                                {{ $user->getFacultyMemberFullName($user->faculty_member_id) }}
                                            @endif
                                            @if (Route::is('admin.user.student.index'))
                                                {{ $user->getStudentFullName($user->student_id) }}
                                            @endif
                                        </td>

                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        <td>
                                            @if ($user->status == 'online')
                                                <span class="badge bg-success">{{ $user->status }}</span>
                                            @endif
                                            @if ($user->status == 'offline')
                                                <span class="badge bg-danger">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                @if (Route::is('admin.user.faculty.index'))
                                                    @php
                                                        $route = route('admin.user.faculty.show', $user->id);
                                                    @endphp
                                                @endif
                                                @if (Route::is('admin.user.student.index'))
                                                    @php
                                                        $route = route('admin.user.student.show', $user->id);
                                                    @endphp
                                                @endif
                                                <a href="{{ $route }}" class="btn btn-link text-info"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="View Info.">
                                                    <i class="ri-eye-line text-info" aria-hidden="true"></i>
                                                </a>
                                                <button class="btn btn-link text-primary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Change password">
                                                    <i class="ri-pencil-line text-primary" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-link text-danger" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Logout User">
                                                    <i class="ri-shut-down-line text-danger" aria-hidden="true"></i>
                                                </button>
                                                @include('AMS.backend.admin-layouts.user.modal._edit')
                                                @include('AMS.backend.admin-layouts.user.modal._delete')
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "ordering": false
            });
        });
    </script>
    {{-- generate a jquery code for showing and hiding password --}}
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
    <script>
        $(document).ready(function() {
            $('#alert-password-e').hide();
            $('#alert-password_confirmation-e').hide();
            $('#show-e').click(function() {
                if ($(this).is(':checked')) {
                    $('#password-e').attr('type', 'text');
                    $('#password_confirmation-e').attr('type', 'text');
                    console.log('checked')
                } else {
                    $('#password-e').attr('type', 'password');
                    $('#password_confirmation-e').attr('type', 'password');
                    console.log('uncheked')
                }
            });
            /* check also if the password is 8 characters */
            $('#password-e').keyup(function() {
                if ($('#password-e').val()
                    .length >= 8) {
                    $('#password-e').css('border', '1px solid green');
                    $('#alert-password-e').hide();
                    $('#submit-e').prop('disabled', false);
                } else {
                    $('#password-e').css('border', '1px solid red');
                    $('#alert-password-e').show();
                    $('#alert-password-e').text('Password must be 8 characters');
                    $('#submit-e').prop('disabled', true);
                }
            });
            /* check if the password and confirm password are the same */
            $('#password_confirmation-e').keyup(function() {
                if ($('#password-e').val() == $('#password_confirmation-e').val()) {
                    $('#password_confirmation-e').css('border', '1px solid green');
                    $('#alert-password_confirmation-e').hide();
                    if ($('#password-e').val()
                        .length >= 8) {
                        $('#submit-e').prop('disabled', false);
                    }
                } else {
                    $('#password_confirmation-e').css('border', '1px solid red');
                    $('#alert-password_confirmation-e').show();
                    $('#alert-password_confirmation-e').text(
                        'Password and Confirm Password must be the same');
                    $('#submit-e').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
