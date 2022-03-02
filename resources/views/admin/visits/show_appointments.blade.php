@include('admin.links')
<style>
    /* button {
        background-color: rgb(123, 255, 0) !important;
    } */

    .dt-buttons,
    .btn-group,
    .flex-wrap {
        gap: 10px;
    }

</style>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">Dental</span>-Clinic</a>
            <form action="{{ route('appointments.search') }}">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" name="search" placeholder="Enter Date..">
                </div>
            </form>
        </div>
    </nav>
    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Appointments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Appointments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                 @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close">&times;</button>
                        </div>
                    @endif
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users Appointments</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Visit Type</th>
                                            <th>Status</th>
                                            <th>Drug Prescription</th>
                                            <th>Red Test</th>
                                            <th>Diagnosis</th>
                                            <th>Approving</th>
                                            <th>Canceling</th>
                                            <th>Make Bill</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->patient['name'] }}</td>
                                                <td>{{ $appointment->patient['phone'] }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>{{ $appointment->visit_type }}</td>
                                                <td>{{ $appointment->status }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <form action="{{ route('appointments.approved', $appointment->id) }}"
                                                        method="GET">
                                                        @if ($appointment->status == 'In-Progress')
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Approave</button>
                                                        @elseif ($appointment->status == 'Approved')
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Dis-Approave</button>
                                                        @else
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Approave</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('appointments.canceled', $appointment->id) }}"
                                                        method="GET">
                                                        @if ($appointment->status == 'Canceled')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                disabled
                                                                onclick="return confirm('Are You Sure To Cancel this Appointment?')">Cancel</button>
                                                        @else
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Cancel this Appointment?')">Cancel</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('bill.show',$appointment->id) }}" method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger">Create Bill</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')

</div>
<!-- ./wrapper -->

@include('admin.scripts')
