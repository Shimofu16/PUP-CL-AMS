@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Attendance Logs - Charts
@endsection

@section('contents')
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
@endsection
