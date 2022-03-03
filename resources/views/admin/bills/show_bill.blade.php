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
<!-- jQuery -->
<script src="../../../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
{{-- <script src="../../../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- DataTables  & Plugins -->
<script src="../../../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../admin/plugins/jszip/jszip.min.js"></script>
<script src="../../../admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
</script>
</body>

</html>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                        <h1>Bill Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Bill Details</li>
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
                                <h3 class="card-title">Bill Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Visit Type</th>
                                            <th>Total Price</th>
                                            <th>Drug Prescription</th>
                                            <th>Price</th>
                                            <th>Diagnosis</th>
                                            <th>Price</th>
                                            <th>Red Test</th>
                                            <th>Price</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $bill->visit->visit_type }}</td>
                                            <td>{{ $total }}</td>
                                            <td>
                                                @foreach ($red as $reds)
                                                    {{ $reds['name'] }} <br>
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($red as $reds)
                                                    {{ $reds['price'] }} <br>
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($diag as $diags)
                                                    {{ $diags['name'] }} <br>
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($diag as $diags)
                                                    {{ $diags['price'] }} <br>
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($drug as $drugs)
                                                    {{ $drugs['name'] }} <br>
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($drug as $drugs)
                                                    {{ $drugs['price'] }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('bill.delete', $bill->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Are You Sure To Delete this item?')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
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
