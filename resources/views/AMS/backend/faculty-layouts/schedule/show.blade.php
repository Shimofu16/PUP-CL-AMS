@extends('AMS.backend.faculty-layouts.sidebar')

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
                        {{-- back button --}}
                        <div class="d-flex">
                            <a href="{{ route('faculty.schedule.index') }}" class="btn btn-maroon me-1">
                                <i class="ri-arrow-go-back-line"></i>
                                Back
                            </a>
                            @if (Auth::user()->facultyMember->checkIfTeacherAlreadyTimeIn())
                                <form
                                    action="{{ route('faculty.schedule.update', ['type' => 'out', 'id' => $ScheduleDate->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-maroon me-1">
                                        Time out
                                    </button>
                                </form>
                            @else
                                @if ($ScheduleDate)
                                    <form
                                        action="{{ route('faculty.schedule.update', ['type' => 'in', 'id' => $ScheduleDate->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-maroon me-1">
                                            Time in
                                        </button>
                                    </form>
                                @else
                                @endif
                            @endif
                            <div class="dropdown">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dates
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($schedule->scheduleDates as $schedule_date)
                                        <li><a class="dropdown-item {{ $ScheduleDate && $ScheduleDate->id == $schedule_date->id ? 'active' : '' }}"
                                                href="{{ route('faculty.schedule.show', ['id' => $schedule->id, 'date_id' => $schedule_date->id]) }}">{{ date('F d, Y', strtotime($schedule_date->date)) }}</a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('faculty.schedule.show', ['id' => $schedule->id]) }}"
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
                        <table class="table" id="students-table">
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
                                    $logs = $ScheduleDate
                                        ? $schedule->getLogsByDate($ScheduleDate->date)
                                        : $schedule
                                            ->attendanceLogs()
                                            ->where('student_id', '!=', null)
                                            ->get();
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
