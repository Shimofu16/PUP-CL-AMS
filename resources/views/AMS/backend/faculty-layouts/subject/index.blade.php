@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    Subjects
@endsection

@section('contents')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#subject-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
