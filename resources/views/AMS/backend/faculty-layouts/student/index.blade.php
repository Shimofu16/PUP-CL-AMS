@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    Students
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between border-bottom-0">
                    <h3 class="text-maroon">@yield('page-title')</h3>
                    <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add
                        Faculty </button>
                    @include('AMS.backend.faculty-layouts.faculty.modal._add')
                </div>
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table" id="students-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone No.</th>
                                <th scope="col">Address</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Section & Course</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>

                                    <td>
                                        {{ $student->getFullName() }}
                                    </td>
                                    <td>
                                        {{ $student->email }}
                                    </td>
                                    <td>
                                        {{ $student->phone }}
                                    </td>
                                    <td>
                                        {{ $student->address }}
                                    </td>
                                    <td>
                                        {{ $student->date_of_birth }}
                                    </td>
                                    <td>
                                        {{ $student->gender }}
                                    </td>
                                    <td>
                                        {{ $student->section->section_name }} -
                                        {{ $student->course->course_code }}
                                    <td>
                                        <div class="d-flex justify-content-center px-2 py-1">
                                            <button class="btn btn-link text-primary mb-0" type="button"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $student->id }}">
                                                <i class="ri-edit-line text-primary me-2" aria-hidden="true""></i>
                                            </button>
                                            <button class="btn btn-link text-danger mb-0" type="button"
                                                data-bs-toggle="modal" data-bs-target="#delete{{ $student->id }}">
                                                <i class="ri-delete-bin-6-line text-danger" aria-hidden="true"></i>
                                            </button>
                                            @include('AMS.backend.faculty-layouts.student.modal._edit')
                                            @include('AMS.backend.faculty-layouts.student.modal._delete')

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
            $('#students-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
