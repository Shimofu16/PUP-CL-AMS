@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    Students
@endsection

@section('contents')

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#student-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
