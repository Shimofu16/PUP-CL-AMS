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
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add Schedule</button>
                       {{--  @include('AMS.backend.admin-layouts.computer.modal._add') --}}
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="course-table">
                            <thead>
                                <tr>
                                    <th scope="col">one</th>
                                    <th scope="col">two</th>
                                    <th scope="col">three</th>
                                    <th scope="col">four</th>
                                    <th scope="col">five</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    {{-- <tr>


                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-primary px-3 mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $schedule->id }}">
                                                    <i class="ri-edit-line text-primary me-2" aria-hidden="true""></i>
                                                </button>


                                                @include('AMS.backend.admin-layouts.schedule.modal._edit')

                                            </div>
                                        </td>
                                    </tr> --}}
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
            $('#courses-table').DataTable();
        });
    </script>
@endsection
