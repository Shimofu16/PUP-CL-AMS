@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    Courses
@endsection

@section('contents')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#course-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
