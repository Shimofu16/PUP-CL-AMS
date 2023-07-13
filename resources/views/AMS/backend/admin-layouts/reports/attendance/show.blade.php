@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    {{ $section }} - {{ $subject }} @if ($ScheduleDate)
    ({{ date('F d, Y', strtotime($ScheduleDate->date)) }})
@else
    (No Schedule for today)
@endif
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>

                        <div class="d-flex">
                            <a href="{{ route('admin.report.attendance.index') }}" class="btn btn-outline-maroon me-1">
                                <i class="ri-arrow-go-back-line"></i>
                                Back
                            </a>
                            <div class="dropdown">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dates
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($schedule->scheduleDates as $schedule_date)
                                        <li><a class="dropdown-item {{ $ScheduleDate && $ScheduleDate->id == $schedule_date->id ? 'active' : '' }}"
                                                href="{{ route('admin.report.attendance.show', ['id' => $schedule->id, 'date_id' => $schedule_date->id]) }}">{{ date('F d, Y', strtotime($schedule_date->date)) }}</a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('admin.report.attendance.show', ['id' => $schedule->id]) }}"
                                            class="dropdown-item">
                                            <div class="d-flex align-items-center">
                                                <span class="me-1">Reset filter</span> <i class="ri-refresh-line"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="schedules-table">
                            <thead>
                                <tr>
                                    <th scope="col">Student</th>
                                    <th scope="col">Computer No.</th>
                                    <th scope="col">Time in</th>
                                    <th scope="col">Time Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $logs = $ScheduleDate ? $schedule->getLogsByDate($ScheduleDate->date) : $schedule->attendanceLogs()->where('student_id','!=',null)->get();
                                @endphp
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>
                                            {{ $log->student->getFullName() }}
                                        </td>
                                        <td>
                                            {{ $log->computer->computer_number }}
                                        </td>
                                        <td>
                                            {{ date('h:i A', strtotime($log->time_in)) }}
                                        </td>
                                        <td>
                                            @if ($log->time_out != null)
                                                {{ date('h:i A', strtotime($log->time_out)) }}
                                            @else
                                                <span class="badge bg-danger">No Data</span>
                                            @endif
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
{{-- @section('contents')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <a href="{{ route('admin.report.attendance.index') }}" class="btn btn-outline-maroon">
                            <i class="ri-arrow-go-back-line"></i>
                            Back
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title text-center">Weekly Attendance</h5>
                                <!-- Pie Chart -->
                                @if (count($getTotalPerWeek) == 0)
                                    <div class="alert alert-danger text-center">
                                        <strong>No data found!</strong>
                                    </div>
                                @else
                                    <canvas id="weekly" class="h-60 w-60">
                                    </canvas>
                                @endif

                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title text-center">Daily Attendance</h5>
                                <!-- Pie Chart -->
                                @if (count($getTotalToday) == 0)
                                    <div class="alert alert-danger text-center">
                                        <strong>No data found!</strong>
                                    </div>
                                @else
                                    <canvas id="daily" class="h-60 w-60">

                                    </canvas>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title text-center">Semester Attendance</h5>
                                <!-- Pie Chart -->
                                @if (count($getTotalPerSemester) == 0)
                                    <div class="alert alert-danger text-center">
                                        <strong>No data found!</strong>
                                    </div>
                                @else
                                    <canvas id="semester" class="h-60 w-60">
                                    </canvas>
                                @endif

                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title text-center">School year Attendance</h5>
                                <!-- Pie Chart -->
                                @if (count($getTotalPerSchoolYear) == 0)
                                    <div class="alert alert-danger text-center">
                                        <strong>No data found!</strong>
                                    </div>
                                @else
                                    <canvas id="sy" class="h-60 w-60">
                                    </canvas>
                                @endif

                            </div>
                        </div>
                        <!-- End Pie CHart -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        const colors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22',
            '#17becf', '#1b9e77', '#d95f02', '#7570b3', '#e7298a'
        ];

        function generateChartStudent(selector, label, data) {
            const dataLength = data.length;
            const backgroundColors = colors.slice(0, dataLength);
            new Chart(document.querySelector(selector), {
                type: 'pie',
                data: {
                    labels: data.map(d => d.course_code),
                    datasets: [{
                        label: label,
                        data: data.map(d => d.students_count),
                        backgroundColor: backgroundColors,
                        hoverOffset: 4
                    }]
                }
            });
        }
        function generateAttendanceChart(selector, label, data) {
            const dataLength = data.length;
            const backgroundColors = colors.slice(0, dataLength);
            new Chart(document.querySelector(selector), {
                type: 'pie',
                data: {
                    labels: data.map(d => d.name ),
                    datasets: [{
                        label: label,
                        data: data.map(d => d.attendance_logs_count ),
                        backgroundColor: backgroundColors,
                        hoverOffset: 4
                    }]
                }
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            generateChartStudent('#weekly', 'Weekly Attendance Logs', {!! $getTotalPerWeek !!});
            generateChartStudent('#daily', 'Daily Attendance Logs', {!! $getTotalToday !!});
            generateAttendanceChart('#semester', 'Semester Attendance Logs', {!! $getTotalPerSemester !!});
            generateAttendanceChart('#sy', 'School Year Attendance Logs', {!! $getTotalPerSchoolYear !!});
        });
    </script>
@endsection --}}
