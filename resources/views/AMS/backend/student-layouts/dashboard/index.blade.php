@extends('AMS.backend.student-layouts.sidebar')

@section('page-title')
    Dashboard
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-6">
            <div class="card top-selling overflow-auto">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item"
                                href="{{ route('student.dashboard.index',['filter' => 'today']) }}">Today</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('student.dashboard.index', ['filter' => 'week']) }}">This Week</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('student.dashboard.index', ['filter' => 'month']) }}">This Month</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0" style="height: 40%">
                    <h5 class="card-title">Schedules <span>| {{ Str::ucfirst($filter) }}</span></h5>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Section</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td>
                                        {{ $schedule->subject->subject_name }}
                                    </td>
                                    <td>
                                        {{ $schedule->section->section_name }}
                                    </td>

                                    <td>
                                        {{ date('F d, Y', strtotime($schedule->date)) }}
                                        <br>
                                        At {{ date('h:i:a', strtotime($schedule->start_time)) }} -
                                        {{ date('h:i:a', strtotime($schedule->end_time)) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        No schedules for {{ $filter }}.
                                    </td>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
