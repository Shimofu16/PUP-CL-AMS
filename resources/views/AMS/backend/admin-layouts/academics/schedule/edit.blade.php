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
                        <div class="buttons">
                            <button class="btn btn-outline-maroon me-1" data-bs-toggle="modal" data-bs-target="#addDate">Add
                                Date</button>
                            {{-- bacl buton with icon --}}
                            <a href="{{ route('admin.academic.schedule.index') }}" class="btn btn-outline-maroon">
                                <i class="ri-arrow-go-back-line"></i>
                                Back</a>

                        </div>
                    @include('AMS.backend.admin-layouts.academics.schedule.modal._addDate')

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="schedules-table">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule->scheduleDates as $date)
                                   <tr>
                                        <td>
                                            @if ($date->hasConflict)
                                                <span class="text-danger">{{ date('l', strtotime($date->date)) }} - {{ date('F d, Y', strtotime($date->date)) }} </span>
                                            @else

                                            {{ date('l', strtotime($date->date)) }} - {{ date('F d, Y', strtotime($date->date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('h:i A', strtotime($date->start_time)) }} - {{ date('h:i A', strtotime($date->end_time)) }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link text-primary px-3 mb-0" data-bs-toggle="modal" data-bs-target="#editDate{{ $date->id }}">
                                                <i class="ri-edit-line text-primary me-2" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-link text-danger px-3 mb-0" data-bs-toggle="modal" data-bs-target="#delete{{ $date->id }}">
                                                <i class="ri-delete-bin-6-line text-danger me-2" aria-hidden="true"></i>
                                            </button>
                                            @include('AMS.backend.admin-layouts.academics.schedule.modal._editDate')
                                            @include('AMS.backend.admin-layouts.academics.schedule.modal._delete')
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
