@extends('AMS.backend.student-layouts.sidebar')

@section('page-title')
    Attendance
@endsection

@section('contents')
<section class="section">
    <div class="row justify-content-center align-content-center overflow-hidden" style="height: 100vh; width: 100%" >
        <div class="col-6">
            {{-- generate a card with button of "take attendance" in the middle --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Todo :)</h4>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary">Take Attendance</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

