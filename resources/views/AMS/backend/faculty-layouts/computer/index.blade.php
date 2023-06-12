@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    Computers
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
                        <table class="table" id="computers-table">
                            <thead>
                                <tr>
                                    <th scope="col">Computer no.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Specification</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($computers as $computer)
                                    <tr>
                                        <td>
                                            {{ $computer->computer_number }}
                                        </td>

                                        <td>
                                            {{ $computer->computer_name }}
                                        </td>

                                        <td>
                                            <button class="btn btn-link text-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#specs{{ $computer->id }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="ri-eye-line text-primary" aria-hidden="true"></i>
                                            </button>
                                            @include('AMS.backend.admin-layouts.computer.modal._specs')
                                        </td>
                                        <td>
                                            @if ($computer->getStatus() === true)
                                                <span class="badge bg-success">Working</span>
                                            @elseif ($computer->getStatus() === false)
                                                <span class="badge bg-danger">Not Working</span>
                                            @else
                                                <span class="badge bg-warning">No data</span>
                                            @endif
                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-link text-primary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#add{{ $computer->id }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="add report">
                                                    <i class="ri-add-line text-primary" aria-hidden="true"></i>
                                                    Add Report
                                                </button>
                                                @include('AMS.backend.faculty-layouts.computer.modal._add')
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
            $('#computers-table').DataTable({
                "ordering": false

            });
        });
    </script>
@endsection
