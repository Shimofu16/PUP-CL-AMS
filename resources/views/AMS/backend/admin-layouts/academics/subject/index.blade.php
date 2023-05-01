@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Subjects
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add
                            Subject</button>
                        @include('AMS.backend.admin-layouts.academics.subject.modal._add')
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="subjects-table">
                            <thead>
                                <tr>
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Units</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>

                                        <td>
                                            {{ $subject->subject_code }}
                                        </td>
                                        <td>
                                            {{ $subject->subject_name }}
                                        </td>
                                        <td>
                                            {{ $subject->subject_description }}
                                        </td>
                                        <td>
                                            {{ $subject->units }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-primary mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $subject->id }}">
                                                    <i class="ri-edit-line text-primary me-2" aria-hidden="true""></i>
                                                </button>
                                                <button class="btn btn-link text-danger mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $subject->id }}">
                                                    <i class="ri-delete-bin-6-line text-danger" aria-hidden="true"></i>
                                                </button>


                                                @include('AMS.backend.admin-layouts.academics.subject.modal._edit')
                                                @include('AMS.backend.admin-layouts.academics.subject.modal._delete')

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
            $('#subjects-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
