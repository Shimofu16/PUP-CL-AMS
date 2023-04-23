@extends('AMS.backend.faculty-layouts.sidebar')

@section('page-title')
    Faculty
@endsection

@section('contents')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#faculty-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
