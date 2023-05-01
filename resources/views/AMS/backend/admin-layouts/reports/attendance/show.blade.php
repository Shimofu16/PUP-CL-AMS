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
                                <canvas id="weekly" class="h-60 w-60"></canvas>

                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title text-center">Daily Attendance</h5>
                                <!-- Pie Chart -->
                                <canvas id="daily" class="h-60 w-60"></canvas>
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
        const WColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22',
            '#17becf', '#1b9e77', '#d95f02', '#7570b3', '#e7298a',
        ];
        const wdataLength = {{ count($getTotalPerWeek) }};
        const wcolors = WColors.slice(0, wdataLength);
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#weekly'), {
                type: 'pie',
                data: {
                    labels: [
                        @foreach ($getTotalPerWeek as $course)
                            '{{ $course->course_code }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Weekly Attendance Logs',
                        data: [
                            @foreach ($getTotalPerWeek as $total)
                                '{{ $total->attendance_logs_count }}',
                            @endforeach
                        ],
                        backgroundColor: wcolors,
                        hoverOffset: 4
                    }]
                }
            });
        });
    </script>
    <script>
        // define color schemes
        const DCcolors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22',
            '#17becf', '#1b9e77', '#d95f02', '#7570b3', '#e7298a',
        ];
        const ddataLength = {{ count($getTotalToday) }};
        const dcolors = DCcolors.slice(0, ddataLength);
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#daily'), {
                type: 'pie',
                data: {
                    labels: [
                        @foreach ($getTotalToday as $course)
                            '{{ $course->course_code }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Daily Attendance Logs',
                        data: [
                            @foreach ($getTotalToday as $course)
                                '{{ $course->attendance_logs_count }}',
                            @endforeach
                        ],
                        backgroundColor: dcolors,
                        hoverOffset: 4
                    }]
                }
            });
        });
    </script>
@endsection
