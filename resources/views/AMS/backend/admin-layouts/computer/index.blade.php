@extends('AMS.backend.admin-layouts.sidebar')



@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">Computers</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add Computer</button>
                        @include('AMS.backend.admin-layouts.computer.modal._add')
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="computers-talble">
                            <thead>
                                <tr>
                                    <th scope="col">Computer no.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">OS</th>
                                    <th scope="col">Processor</th>
                                    <th scope="col">Memory</th>
                                    <th scope="col">Storage</th>
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
                                            {{ $computer->os }}
                                        </td>

                                        <td>
                                            {{ $computer->processor }}
                                        </td>

                                        <td>
                                            {{ $computer->memory }}
                                        </td>

                                        <td>
                                            {{ $computer->storage }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-link text-primary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $computer->id }}">
                                                    <i class="ri-edit-line text-primary" aria-hidden="true""></i>
                                                </button>

                                                <button class="btn btn-link text-danger" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $computer->id }}">
                                                    <i class="ri-delete-bin-line text-danger" aria-hidden="true""></i>
                                                </button>
                                                @include('AMS.backend.admin-layouts.computer.modal._edit')
                                                @include('AMS.backend.admin-layouts.computer.modal._delete')
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
            $('#computers-talble').DataTable();
        });
    </script>
@endsection
