@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    {{ $pageTitle }}
    @if (Route::is('admin.user.account.faculty.index'))
        Accounts
    @else
        Informations
    @endif
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')
                        </h3>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-maroon me-1" data-bs-toggle="modal" data-bs-target="#add">Add
                                @if (Route::is('admin.user.account.faculty.index'))
                                    Account
                                @else
                                    Faculty Member
                                @endif
                            </button>
                            @if (Route::is('admin.user.account.faculty.index'))
                                <a href="{{ route('admin.user.account.faculty.resetAllPassword') }}"
                                    class="btn btn-outline-maroon">Reset All Password</a>
                            @endif
                            @include('AMS.backend.admin-layouts.user.faculty.modal._add')
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="users-table">
                            @if (Route::is('admin.user.account.faculty.index'))
                                <!-- Table with stripped rows -->
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
                                                    {{ $user->facultyMember->getFullName() }}

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
                                                    <button class="btn btn-link text-info" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#logs{{ $user->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="View logs.">
                                                        <i class="ri-eye-line text-info" aria-hidden="true"></i>
                                                    </button>
                                                    @include('AMS.backend.admin-layouts.user.faculty.modal._logs')
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">

                                                        <a href="{{ route('admin.user.account.faculty.show', $user->id) }}"
                                                            class="btn btn-link text-info" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="View Info.">
                                                            <i class="ri-eye-line text-info" aria-hidden="true"></i>
                                                        </a>
                                                        <button class="btn btn-link text-primary" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Change password">
                                                            <i class="ri-pencil-line text-primary" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-link text-danger" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $user->id }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Logout User"
                                                            {{ $user->status == 'offline' ? 'disabled' : '' }}>
                                                            <i class="ri-shut-down-line text-danger" aria-hidden="true"></i>
                                                        </button>
                                                        @include('AMS.backend.admin-layouts.user.faculty.modal._edit')
                                                        @include('AMS.backend.admin-layouts.user.faculty.modal._delete')
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            @else
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Department</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column ">
                                                    <span>{{ $user->facultyMember->getFullName() }}</span>
                                                    <small>{{ $user->facultyMember->email }}</small>
                                                </div>
                                            </td>

                                            <td>
                                                {{ $user->facultyMember->phone }}
                                            </td>
                                            <td>
                                                {{ $user->facultyMember->department->department_name }}
                                            </td>



                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-link text-primary" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Change password">
                                                        <i class="ri-pencil-line text-primary" aria-hidden="true"></i>
                                                    </button>
                                                    @include('AMS.backend.admin-layouts.user.faculty.modal._edit')
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif

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
