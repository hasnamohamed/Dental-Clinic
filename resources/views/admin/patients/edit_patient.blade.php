@include('admin.links')
<style>
    form.updateDoctor {
        padding: 50px;
    }

    form.updateDoctor button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        box-shadow: 2px 4px 10px rgb(0 0 0 / 20%);
    }

    form.updateDoctor [type='file'] {
        width: 50%;
        border: none;
    }

    form.updateDoctor select {
        width: 100%;
        cursor: pointer;
    }

    form.updateDoctor select,
    form.updateDoctor select option {
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

    /*
    #docImagePreview {
        display: none;
    } */

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
                        <h1>Update Patient</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Update Patient</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="updateDoctor">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Patient Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="nameHelp" value="{{ $patient->name }}">
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
                                    aria-describedby="phoneHelp" value="{{ $patient->phone }}">
                                @error('phone')
                                    <div class="col-auto">
                                        <span id="phoneHelpInline" class="form-text">
                                            {{ $message = 'Phone Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select form-select-lg mb-3" id="gender" name="gender" aria-label="spec">
                                    <option value="-1" selected>--Select--</option>
                                    <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>
                                        female</option>
                                    <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>
                                        male
                                    </option>

                                </select>
                                @error('spec')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">age</label>
                                <input type="text" class="form-control" id="age" name="age"
                                    aria-describedby="roomNoHelp" value="{{ $patient->age }}">
                                @error('age')
                                    <div class="col-auto">
                                        <span id="roomNoHelpInline" class="form-text">
                                            {{ $message = 'Age Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
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

                $('#docImagePreview')
                    .attr('src', e.target.result)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
