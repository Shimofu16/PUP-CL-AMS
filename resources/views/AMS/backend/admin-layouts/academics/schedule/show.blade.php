@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    {{ $schedule->subject->subject_name }} - Dates
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        {{-- back button with icon --}}
                        <a class="btn btn-outline-maroon" href="{{ route('admin.academic.schedule.index') }}">
                            <i class="ri-arrow-go-back-line"></i>
                            Back
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div id='calendar'></div>
                            </div>
                            <div class="col-4">
                                <h4 class="text-maroon mb-3">Edit Date</h4>
                                <form action="{{ route('admin.academic.schedule.update', ['id' => $schedule->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    {{-- generate a select dropdown for dates --}}
                                    <div class="mb-3">
                                        <label for="date_id" class="form-label">Date</label>
                                        <select name="date_id" id="date_id" class="form-select">
                                            <option value="">----- Select Date -----</option>
                                            @foreach ($schedule->scheduleDates as $schedule_date)
                                                <option value="{{ $schedule_date->id }}">
                                                    {{ date('F d, Y', strtotime($schedule_date->date)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- generate a date --}}
                                    <div class="mb-3">
                                        <label for="new_date" class="form-label">New Date</label>
                                        <input type="date" name="new_date" id="new_date" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-maroon">
                                            <i class="ri-save-line"></i>
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('styles')
    <script src="{{ asset('assets/packages/fullcalendar-6.1.8/packages/core/index.global.min.js') }}"></script>
    <script src="{{ asset('assets/packages/fullcalendar-6.1.8/packages/daygrid/index.global.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($schedule->scheduleDates as $schedule_date)
                        {
                            title: '{{ $schedule->subject->subject_name }}',
                            start: '{{ $schedule_date->date }}',
                            end: '{{ $schedule_date->date }}',
                            url: '{{ route('admin.academic.schedule.edit', ['id' => $schedule->id]) }}',
                            color: '#378006',
                            textColor: 'white'
                        },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
@endsection
