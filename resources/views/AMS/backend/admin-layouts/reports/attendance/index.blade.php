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
                        <table class="table" id="schedules-table">
                            <thead>
                                <tr>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Students</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>
                                            {{ $schedule->teacher->getFullName() }}
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('admin.report.attendance.show', ['id' => $schedule->id]) }}">{{ $schedule->section->section_name }}</a>
                                        </td>
                                        <td>
                                            {{-- button with eye icon --}}
                                            <button class="btn btn-sm btn-link text-info" type="button"
                                                data-bs-toggle="modal" data-bs-target="#view{{ $schedule->id }}">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            @include('AMS.backend.faculty-layouts.schedule.modal._view')
                                        </td>
                                        <td>
                                            {{ $schedule->subject->subject_name }}
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
            $('#schedules-table').DataTable({
                "ordering": false

            });
        });
    </script>
@endsection
