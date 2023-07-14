@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Requests
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="requests-table">
                            <thead>
                                <tr>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Old Date/Time</th>
                                    <th scope="col">Requested Date/Time</th>
                                    {{-- <th scope="col">Status</th> --}}
                                    <th scope="col">Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                    <tr>
                                        <td>
                                            {{ $request->scheduleDate->schedule->teacher->getFullName() }} <br>
                                            {{ $request->scheduleDate->schedule->subject->subject_name }}
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>
                                                    {{ date('F d, Y',strtotime($request->scheduleDate->date)) }}
                                                </span>
                                                <span>At {{ date('h:i A', strtotime($request->scheduleDate->start_time)) }} - {{ date('h:i A', strtotime($request->scheduleDate->end_time)) }}</span>
                                            </div>

                                        </td>

                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>
                                                    {{ date('F d, Y',strtotime($request->new_date)) }}
                                                </span>


                                                <span>At {{ date('h:i A', strtotime($request->start_time)) }} - {{ date('h:i A', strtotime($request->end_time)) }}</span>
                                            </div>
                                        </td>

                                        {{--  <td>
                                            @if ($request->status === 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($request->status === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td> --}}
                                        <td>

                                            <button class="btn btn-link text-info" type="button" data-bs-toggle="modal"
                                                data-bs-target="#request{{ $request->id }}">
                                                {{-- eye icon --}}
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            @include('AMS.backend.admin-layouts.reports.schedule.modal._request')
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
            $('#requests-table').DataTable({
                "ordering": false

            });
        });
    </script>
@endsection
