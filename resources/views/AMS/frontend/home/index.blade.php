@extends('AMS.frontend.layouts.master')

@section('contents')
    <div class="card-body pt-1">
        <h2 class="card-title" id="time">00:00:00</h2>
        <p class="card-text" id="date">Monday, April 19, 2023</p>
    </div>
    <div class="card-footer bg-transparent border-0 mb-3">
        <a href="{{ route('login.index') }}" id="login" class="btn btn-outline-maroon text-maroon">
            Login
        </a>
        <a href="{{ route('register.index') }}" id="register" class="btn btn-maroon">
            Register
        </a>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/clock.js') }}"></script>
@endsection
