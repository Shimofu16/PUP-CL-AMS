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


            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.computer.index') ? 'active' : '' }}"
                    href="{{ route('faculty.computer.index') }}">
                    <i class="ri-computer-line"></i><span>Computers</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.schedule.*') ? 'active' : '' }}"
                    href="{{ route('faculty.schedule.index') }}">
                    <i class="ri-calendar-todo-line"></i>
                    <span>Schedule</span>
                </a>
            </li>

    </aside>
@endsection
