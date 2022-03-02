<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->

    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="../../admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="/user/profile" class="d-block">
                    @if (Route::has('login'))
                        @auth
                            {{ Auth::user()->name }}
                        @endauth
                    @endif
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Dasboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('patients.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Patients
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('patients.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Add Patient
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('appointments.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Appointments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('appointments.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Add Appointments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('procedures.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Show All Procedures
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('redtests.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Red Test
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('redtests.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Add Red Test
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('diagnosis.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Diagnosis
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('diagnosis.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Add Diagnosis
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('prescriptions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Drug Prescriptions
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('prescriptions.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Add Drug Prescriptions
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
