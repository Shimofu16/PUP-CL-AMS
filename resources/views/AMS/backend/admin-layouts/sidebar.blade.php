@extends('AMS.backend.layouts.master')

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard.index') ? "active" : "" }}" href="{{ route('admin.dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.computer.index') ? "active" : "" }}"  href="{{ route('admin.computer.index') }}">
                    <i class="ri-computer-line"></i><span>Computers</span>
                </a>

            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link "  href="">
                    <i class="ri-history-line"></i><span>History</span>
                </a>

            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-file-chart-line"></i><span>Report</span>
                </a>
               {{--  <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>General Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul> --}}
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.schedule.index') }}">
                    <i class="ri-calendar-2-line"></i><span>Schedules</span>
                </a>
            </li>
            <!-- End Charts Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" href="#">
                    <i class="ri-user-settings-line"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.user.faculty.index') }}">
                            <i class="bi bi-circle"></i><span>Faculty</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.student.index') }}">
                            <i class="bi bi-circle"></i><span>Student</span>
                        </a>
                    </li>

                </ul>

            </li><!-- End Icons Nav -->

      {{--    <li class="nav-heading">Pages</li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.html">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-file-earmark"></i>
                    <span>Blank</span>
                </a>
            </li> <!-- End Blank Page Nav -->

        </ul> --}}

    </aside>
@endsection
