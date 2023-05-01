@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Attendance Logs
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <a href="{{ route('admin.report.attendance.charts') }}" class="btn btn-outline-maroon">
                            <i class="ri-line-chart-line"></i>
                            Charts
                        </a>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="attendance_logs-table">
                            <thead>
                                <tr>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">time in and out</th>
                                    <th scope="col">Computer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                    {{-- <th scope="col" class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance_logs as $attendance)
                                    <tr>
                                        <td>
                                            {{ $attendance->teacherClass->teacher->getFullName() }} <br>
                                            {{ $attendance->teacherClass->subject->subject_name }}
                                        </td>
                                        <td>
                                            {{ $attendance->student->getFullName() }} <br>
                                            {{ $attendance->teacherClass->section->section_name }} - 
                                            {{ $attendance->teacherClass->section->course->course_code }}
                                        </td>
                                        <td>
                                            {{-- format time in and time out using date --}}
                                            {{ date('h:i A', strtotime($attendance->time_in)) }} - 
                                            {{ date('h:i A', strtotime($attendance->time_out)) }}
                                        </td>
                                        <td>
                                            {{ $attendance->computer->computer_number }}
                                        </td>
                                        <td>
                                            @if ($attendance->status == "Working")
                                                <span class="badge bg-success">Working</span>
                                            @endif
                                            @if ($attendance->status == "Not Working")
                                                <span class="badge bg-danger">Not Working</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#">
                                                {{ Str::limit($attendance->description, 50) }}
                                            </a>
                                        </td>


                                        {{-- <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-link text-primary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $computer->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                    <i class="ri-edit-line text-primary" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-link text-danger" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $computer->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="ri-delete-bin-line text-danger" aria-hidden="true""></i>
                                                </button>
                                                @include('AMS.backend.admin-layouts.computer.modal._edit')
                                                @include('AMS.backend.admin-layouts.computer.modal._delete')
                                            </div>
                                        </td> --}}
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
            $('#attendance_logs-table').DataTable({
                "ordering": false

            });
        });
    </script>
@endsection
