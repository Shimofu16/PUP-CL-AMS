
@extends('AMS.backend.layouts.master')

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('student.dashboard.index') ? 'active' : '' }}"
                    href="{{ route('student.dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('student.attendance.index') ? 'active' : '' }}"
                    href="{{ route('student.attendance.index') }}">
                    <i class="ri-calendar-todo-line"></i>
                    <span>Attendance</span>
                </a>
            </li>
            {{--  wire: --}}
            <!-- End Tables Nav -->

            {{-- <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.student.index') ? 'active' : '' }}"
                    href="{{ route('faculty.student.index') }}">
                    <i class="ri-user-line"></i>
                    <span>Students</span>
                </a>
            </li> --}}



    </aside>
@endsection
