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
   
    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Red Tests</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Result Red Tests</li>
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
                                <h3 class="card-title">Result Red Tests</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Red Test Name</th>
                                            <th>Phone</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($redTests as $redTest)
                                            <tr>
                                                <td>{{ $redTest->name }}</td>
                                                <td>{{ $redTest->price}}</td>
                                                <td>
                                                    <form action="{{ route('redtests.edit', $redTest->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-info">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('redtests.delete',$redTest->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Are You Sure To Delete this item?')">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        
                                    </tfoot>
                                </table>
                                {{-- {!! $doctors->links() !!} --}}
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
