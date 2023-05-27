@extends('AMS.backend.layouts.master')

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.dashboard.index') ? 'active' : '' }}"
                    href="{{ route('faculty.dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.schedule.index') ? 'active' : '' }}"
                    href="{{ route('faculty.schedule.index') }}">
                    <i class="ri-calendar-todo-line"></i>
                    <span>Schedule</span>
                </a>
            </li>

    </aside>
@endsection
