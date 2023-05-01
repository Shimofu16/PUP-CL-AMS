@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Courses
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add
                            Course</button>
                            @include('AMS.backend.admin-layouts.academics.course.modal._add')
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="courses-table">
                            <thead>
                                <tr>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>

                                        <td>
                                            {{ $course->course_code }}
                                        </td>
                                        <td>
                                            {{ $course->display_name }}
                                        </td>
                                        <td>
                                            {{ $course->description }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-primary mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $course->id }}">
                                                    <i class="ri-edit-line text-primary me-2" aria-hidden="true""></i>
                                                </button>
                                                <button class="btn btn-link text-danger mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $course->id }}">
                                                    <i class="ri-delete-bin-6-line text-danger"
                                                        aria-hidden="true"></i>
                                                </button>


                                                @include('AMS.backend.admin-layouts.academics.course.modal._edit')
                                                @include('AMS.backend.admin-layouts.academics.course.modal._delete')

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
            $('#courses-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
