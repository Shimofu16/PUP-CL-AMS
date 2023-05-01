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
                        <div class="d-flex">
                            @if (Route::is('admin.user.faculty.show'))
                                <a href="{{ route('admin.user.faculty.index') }}" class="btn btn-secondary">
                                    <i class="ri-arrow-go-back-line"></i>
                                    Back
                                </a>
                            @endif
                            @if (Route::is('admin.user.student.show'))
                                <a href="{{ route('admin.user.student.index') }}" class="btn btn-secondary">
                                    <i class="ri-arrow-go-back-line"></i>
                                    Back
                                </a>
                            @endif
                            <button class="btn btn-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $user->id }}">
                                <i class="ri-pencil-line"></i>
                                Edit
                            </button>
                            @include('AMS.backend.admin-layouts.user.modal._edit')
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="users-table">
                            @if (Route::is('admin.user.faculty.show'))
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone no.</th>
                                        <th scope="col">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $user->facultyMember->getFullName() }}</span>
                                                <span class="fs-6">{{ $user->facultyMember->email }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $user->facultyMember->phone }}
                                        </td>
                                        <td>
                                            {{ $user->facultyMember->department->department_name }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                            @if (Route::is('admin.user.student.show'))
                                <thead>
                                    <tr>
                                        <th scope="col">Student No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone no.</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Gender</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $user->student->student_no }}
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $user->student->getFullName() }}</span>
                                                <span class="fs-6">{{ $user->student->email }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $user->student->phone }}
                                        </td>
                                        <td>
                                            {{ $user->student->address }}
                                        </td>
                                        <td>
                                            {{ $user->student->date_of_birth }}
                                        </td>
                                        <td>
                                            {{ $user->student->gender }}
                                        </td>

                                    </tr>
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
