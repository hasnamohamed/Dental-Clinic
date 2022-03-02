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
                        <h1>Add Appointment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Add Appointment</li>
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
                        <form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data" class="addpatient">
                            @csrf
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Patient name</label>
                                <select class="form-select form-select-lg mb-3" id="patient_id" name="patient_id" aria-label="name">
                                    <option value="-1" selected>--Select--</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ old('patient_id') == $patient->id  ? 'selected' : '' }}>
                                            {{ $patient->name }}</option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ old('date') }}">
                                @error('date')
                                    <div class="col-auto">
                                        <span id="phoneHelpInline" class="form-text">
                                            {{ $message = 'date Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" name="time"
                                    aria-describedby="phoneHelp" value="{{ old('time') }}">
                                @error('time')
                                    <div class="col-auto">
                                        <span id="phoneHelpInline" class="form-text">
                                            {{ $message = 'Time Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                                <small>Office hours are 9am to 6pm</small>
                            </div>
                            <div class="mb-3">
                                <label for="visit_type" class="form-label">Visit Type</label>
                                <select class="form-select form-select-lg mb-3" id="visit_type" name="visit_type"
                                    aria-label="visit_type">
                                    <option value="-1" selected>--Select--</option>
                                    <option value="Examination"
                                        {{ old('visit_type') == 'Examination' ? 'selected' : '' }}>Examination
                                    </option>
                                    <option value="Consultation"
                                        {{ old('visit_type') == 'Consultation' ? 'selected' : '' }}>Consultation
                                    </option>
                                </select>
                                @error('visit_type')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="drug_id" class="form-label">Drug Prescription</label>
                                <select multiple class="form-select form-select-lg mb-3" id="drug_id" name="drug_id[]" aria-label="name">
                                    <option value="-1" selected>--Select--</option>
                                    @foreach ($drugs as $drug)
                                        <option value="{{ $drug->id }}"
                                            {{ old('drug_id') == $drug->id  ? 'selected' : '' }}>
                                            {{ $drug->name }}</option>
                                    @endforeach
                                </select>
                                @error('drug_id')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="red_id" class="form-label">Red Test</label>
                                <select multiple class="form-select form-select-lg mb-3" id="red_id" name="red_id[]" aria-label="name">
                                    <option value="-1" selected>--Select--</option>
                                    @foreach ($reds as $red)
                                        <option value="{{ $red->id }}"
                                            {{ old('red_id') == $red->id  ? 'selected' : '' }}>
                                            {{ $red->name }}</option>
                                    @endforeach
                                </select>
                                @error('red_id')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="diagnosis_id" class="form-label">Diagnosis</label>
                                <select multiple class="form-select form-select-lg mb-3" id="diagnosis_id" name="diagnosis_id[]" aria-label="name">
                                    <option value="-1" selected >--Select--</option>
                                    @foreach ($diagnosis as $diagnosi)
                                        <option value="{{ $diagnosi->id }}"
                                            {{ old('diagnosis_id') == $diagnosi->id  ? 'selected' : '' }}>
                                            {{ $diagnosi->name }}</option>
                                    @endforeach
                                </select>
                                @error('diagnosis_id')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
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
