@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Students
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">Student</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add</button>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="users-talble">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->getStudentFullName($user->student_id) }}
                                        </td>

                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        <td>
                                            {{ $user->status }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-link text-primary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-link text-danger" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @include('AMS.backend.admin-layouts.user.modal._edit') --}}
                                    {{-- @include('AMS.backend.admin-layouts.user.modal._delete') --}}
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
            $('#users-talble').DataTable();
        });
    </script>
@endsection
