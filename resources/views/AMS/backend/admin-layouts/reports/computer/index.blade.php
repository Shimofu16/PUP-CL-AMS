@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Computer Status Logs
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
                        <table class="table" id="reports-table">
                            <thead>
                                <tr>
                                    <th scope="col">Computer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Checked</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Reported By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->computer->computer_name }}</td>
                                        <td>
                                            @if ($report->status == 'Working')
                                                <span class="badge bg-success">{{ $report->status }}</span>
                                            @elseif($report->status == 'Not Working')
                                                <span class="badge bg-danger">{{ $report->status }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $report->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('M d, Y', strtotime($report->checked_at)) }} at {{ date('h:i A', strtotime($report->checked_at)) }}</td>
                                        <td>
                                            <button class="btn btn-link text-info" type="button" data-bs-toggle="modal"
                                                data-bs-target="#description{{ $report->id }}">
                                                {{-- eye icon --}}
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            @include('AMS.backend.admin-layouts.reports.computer.modal._description')
                                        </td>
                                        <td>{{ $report->user->facultyMember->getFullName() }}</td>
                                        <td>
                                            <div class="">

                                                <button
                                                    class="btn btn-link text-primary"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $report->id }}">
                                                    <i class="ri-edit-line text-primary me-2" aria-hidden="true"></i>
                                                    Edit
                                                </button>
                                                @include('AMS.backend.admin-layouts.reports.computer.modal._edit')
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
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#reports-table').DataTable({
                "ordering": false

            });
        });
    </script>
@endsection
