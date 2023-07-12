@extends('AMS.backend.student-layouts.sidebar')

@section('page-title')
    Attendance - For {{ date('F d, Y', strtotime(now())) }}
@endsection

@section('contents')
    <section class="section">
        <div class="col-12">
            {{-- generate a card with button of "take attendance" in the middle --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between border-bottom-0">
                    <h3 class="text-maroon">@yield('page-title')</h3>
                </div>
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table" id="courses-table">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Time</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>

                                    <td>
                                        {{ $schedule->subject->subject_name }}
                                    </td>
                                    <td>
                                        {{ $schedule->teacher->getFullName() }}
                                    </td>
                                    <td>
                                        @php
                                            $time = $schedule->getTime();
                                        @endphp
                                        {{ date('h:i:a', strtotime($time->start_time)) }}
                                        -
                                        {{ date('h:i:a', strtotime($time->end_time)) }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center px-2 py-1">
                                            <button class="btn btn-link text-primary mb-0" type="button"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $schedule->id }}">
                                                <i class="ri-edit-line text-primary me-2" aria-hidden="true""></i>
                                            </button>
                                            @include('AMS.backend.student-layouts.attendance.modal._take_attendance')
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
    </section>
@endsection
