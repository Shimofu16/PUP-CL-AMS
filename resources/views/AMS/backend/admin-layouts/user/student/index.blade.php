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
                            {{ $section_name != null ? '- ' . $section_name : '' }}
                        </h3>
                        <div class="d-flex align-items-center">
                            <div class="dropdown me-1">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Section
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @php
                                        /* get current route */
                                        $currentRoute = Route::currentRouteName();
                                    @endphp
                                    @foreach ($sections as $section)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route($currentRoute, ['section_id' => $section->id]) }}">{{ $section->section_name }}</a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <hr class="dropdown-divider">
                                        <a href="{{ route($currentRoute) }}"
                                            class="dropdown-item">Reset
                                            Filter</a>
                                    </li>
                                </ul>
                            </div>
                            @if (Route::is('admin.user.account.student.index'))
                                <a href="{{ route('admin.user.account.student.resetAllPassword') }}"
                                    class="btn btn-outline-maroon">Reset All Password</a>
                            @endif
                          
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="students-table">
                            @if (Route::is('admin.user.account.student.index'))
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
                                    @foreach ($students as $user)
                                        <tr>
                                            <td>
                                                {{ $user->getName() }}

                                            </td>

                                            <td>
                                                {{ $user->email }}
                                            </td>

                                            <td>
                                                @if ($user->status == 'online')
                                                    <span class="badge bg-success">{{ $user->status }}</span>
                                                @endif
                                                @if ($user->status == 'offline')
                                                    <span class="badge bg-danger">Last active {{ $user->updated_at->diffForHumans(); }}</span>
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
                            @else
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Date of birth</th>
                                        <th scope="col">Section & Course</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span>{{ $student->getFullName() }}</span>
                                                    <small>{{ $student->email }}</small>
                                                </div>

                                            </td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ date('F d, Y', strtotime($student->date_of_birth)) }}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span>{{ $student->section->section_name }}</span>
                                                    <small>{{ $student->course->course_code }}</small>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-link text-primary" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $student->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Change password">
                                                        <i class="ri-pencil-line text-primary" aria-hidden="true"></i>
                                                    </button>
                                                    @include('AMS.backend.admin-layouts.user.student.modal._edit')
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
            $('#students-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
