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
                        <h3 class="text-maroon">@yield('page-title')
                            @if (Route::is('admin.user.information.student.index'))
                                {{ $section_name != null ? '- ' . $section_name : '' }}
                            @endif
                        </h3>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-maroon me-1" data-bs-toggle="modal" data-bs-target="#add">Add
                                Account</button>
                            @include('AMS.backend.admin-layouts.user.student.modal._add')
                            @if (Route::is('admin.user.information.student.index'))
                                <div class="dropdown">
                                    <button class="btn btn-outline-maroon dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Section
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($sections as $section)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.user.information.student.index', ['section_id' => $section->id]) }}">{{ $section->section_name }}</a>
                                            </li>
                                        @endforeach
                                        <li>
                                            <hr class="dropdown-divider">
                                            <a href="{{ route('admin.user.information.student.index') }}"
                                                class="dropdown-item">Reset
                                                Filter</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        @if (Route::is('admin.user.account.student.index'))
                            <table class="table" id="users-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Logs</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->student->getFullName() }}
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
                                                <button class="btn btn-link text-info" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#logs{{ $user->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View logs.">
                                                    <i class="ri-eye-line text-info" aria-hidden="true"></i>
                                                </button>
                                                @include('AMS.backend.admin-layouts.user.student.modal._logs')
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-link text-primary" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Change password">
                                                        <i class="ri-pencil-line text-primary" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="btn btn-link text-danger" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Logout User"
                                                        {{ $user->status == 'offline' ? 'disabled' : '' }}>
                                                        <i class="ri-shut-down-line text-danger" aria-hidden="true"></i>
                                                    </button>
                                                    @include('AMS.backend.admin-layouts.user.student.modal._edit')
                                                    @include('AMS.backend.admin-layouts.user.student.modal._delete')
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @else
                        <table class="table" id="users-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Logs</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column ">
                                                <span>{{ $student->getFullName() }}</span>
                                                <small>{{ $student->email }}</small>
                                            </div>
                                        </td>
                                        


                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @endif
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
