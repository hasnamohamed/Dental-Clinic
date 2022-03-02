@include('admin.links')
<style>
    form.addpatient {
        padding: 50px;
    }

    form.addpatient button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        box-shadow: 2px 4px 10px rgb(0 0 0 / 20%);
    }

    form.addpatient [type='file'] {
        width: 50%;
        border: none;
    }

    form.addpatient select {
        width: 100%;
        cursor: pointer;
    }

    form.addpatient select,
    form.addpatient select option {
        text-transform: capitalize !important;
    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .form-label {
        width: 100%;
    }

    #docImagePreview {
        display: none;
    }

    .alert {
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        width: 500px;
        padding: 20px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .alert button {
        padding: 3px 15px;
        font-size: 22px;
        border-radius: 17%;
        transition: .3s ease !important;

    }

    .alert button:hover {
        background-color: #50855C;
        color: #FFF;
    }

    #NameHelpInline,
    #phoneHelpInline,
    #specHelpInline,
    #roomNoHelpInline,
    #ImgHelpInline {
        color: rgb(247, 60, 60);
    }

    .mb-3:last-child {
        margin-top: 20px;
    }

</style>
<div class="wrapper">
    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Patient</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Add Patient</li>
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
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close">&times;</button>
                        </div>
                    @endif
                    <div class="col-12">
                        <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off"
                            class="addpatient">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Patient Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="nameHelp" value="{{ old('name') }}">
                                @error('name')
                                    <div class="col-auto">
                                        <span id="NameHelpInline" class="form-text">
                                            {{ $message = 'Name Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    aria-describedby="phoneHelp" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="col-auto">
                                        <span id="phoneHelpInline" class="form-text">
                                            {{ $message = 'Phone Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    aria-describedby="phoneHelp" value="{{ old('age') }}">
                                @error('age')
                                    <div class="col-auto">
                                        <span id="phoneHelpInline" class="form-text">
                                            {{ $message = 'Age Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select form-select-lg mb-3" id="gender" name="gender" aria-label="spec">
                                    <option value="-1" selected>--Select--</option>
                                    <option value="female" {{ old('spec') == 'female' ? 'selected' : '' }}>female</option>
                                    <option value="male" {{ old('spec') == 'male' ? 'selected' : '' }}>male
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">se
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
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

{{-- Show Image beside file input --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {

                $('#docImagePreview').css('display', 'block')
                    .attr('src', e.target.result)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
