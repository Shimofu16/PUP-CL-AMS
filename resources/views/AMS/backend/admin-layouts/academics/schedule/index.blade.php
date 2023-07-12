@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Schedules
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add
                            Schedule</button>
                    @include('AMS.backend.admin-layouts.academics.schedule.modal._add')

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="schedules-table">
                            <thead>
                                <tr>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Dates</th>
                                    <th scope="col">Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>
                                            {{ $schedule->teacher->getFullName() }}
                                        </td>

                                        <td>
                                            {{ $schedule->subject->subject_name }}
                                        </td>
                                        <td>
                                            {{ $schedule->section->section_name }}
                                        </td>

                                        <td>
                                            <a class="btn btn-link text-info px-3 mb-0"
                                            href="{{ route('admin.academic.schedule.edit',['id' => $schedule->id]) }}">
                                                <i class="ri-eye-line text-info me-2" aria-hidden="true"></i>
                                            </a>

                                        </td>

                                        <td>
                                            {{ $schedule->semester->name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#schedules-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
