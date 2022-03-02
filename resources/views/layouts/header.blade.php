<header>
    <div class="topbar">
        <div class="container">
           
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">Dental</span>-Clinic</a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                        aria-describedby="icon-addon1">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <!-- @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->role == 'client' ) -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('my_appointment') }}"
                                style="background-color: rgb(12, 184, 12); color:#FFF;">My
                                Appointments</a>
                        </li>
                    <!-- @elseif (Auth::user()->role == 'admin') -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_doctors') }}">Manage Managers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_appointments') }}">Manage Receptionists</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_appointments') }}">Manage Clients</a>
                        </li>
                    <!-- @elseif (Auth::user()->role == 'manager') -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_doctors') }}">Manage Receptionists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_appointments') }}">Manage Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_appointments') }}">Manage Floors</a>
                        </li>
                    <!-- @else -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_doctors') }}">Manage Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/show_appointments') }}">Approved Clients</a>
                        </li>
                         <!-- @endif -->
                        <x-app-layout>
                        </x-app-layout> 

                    <!-- @else -->
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                        </li>

                    <!-- @endauth
                    @endif -->
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>
