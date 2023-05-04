@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    {{ $section }} - {{ $subject }}
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        {{-- back button --}}
                        <a href="{{ route('faculty.schedule.index') }}" class="btn btn-outline-maroon">
                            <i class="ri-arrow-go-back-line"></i>
                            Back
                        </a>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="students-table">
                            <thead>
                                <tr>
                                    <th scope="col">Student No.</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule->section->students as $student)
                                    <tr>
                                        <td>
                                            {{ $student->student_no }}
                                        </td>
                                        <td>
                                            {{ $student->getFullName() }}
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
            $('#students-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
