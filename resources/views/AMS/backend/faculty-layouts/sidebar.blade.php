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
                <a class="nav-link {{ Route::is('faculty.course.index') ? 'active' : '' }}"
                    href="{{ route('faculty.course.index') }}">
                    <i class="ri-book-open-line"></i>
                    <span>Course</span>
                </a>

            </li><!-- End Components Nav -->

            <!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.faculty.index') ? 'active' : '' }}"
                    href="{{ route('faculty.faculty.index') }}">
                    <i class="ri-user-2-line"></i>
                    <span>Faculty</span>
                </a>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.student.index') ? 'active' : '' }}" href="{{ route('faculty.student.index') }}">
                    <i class="ri-user-line"></i>
                    <span>Students</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.subject.index') ? 'active' : '' }}" href="{{ route('faculty.subject.index') }}">
                    <i class="ri-book-2-line"></i>
                    <span>Subjects</span>
                </a>
            </li>
            <!-- End Charts Nav -->


            <!-- End Icons Nav -->


    </aside>
@endsection
