@extends('layouts.light.master')
@section('title', 'Customers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/dropzone.css') }}">

    {{-- <link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/datatable-extension.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}assets/css/timepicker.css">
@endsection

@section('style')
    <style>
        .dropzone {
            padding: 0px;
            border: 2px solid #000;
            border-radius: 15px;
            -o-border-image: none;
            border-image: none;
            background: #fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            min-height: 150px;
            position: relative;
        }

        .dropzone i {
            font-size: 50px;
            color: #000;
        }

        .dropzone .dz-preview.dz-image-preview {
            background: none !important;
        }

        /* Hide default select dropdown arrow */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Add some styles for better appearance */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            width: 100%;
            box-sizing: border-box;
        }

        /* Style for option label */
        optgroup {
            font-weight: bold;
        }

        /* Style for checkbox container */
        .checkbox-container {
            display: inline-block;
            margin-right: 8px;
        }

        /* Style for the checkbox */
        .checkbox {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style for checked checkbox */
        .checkbox.checked {
            background-color: #007bff;
        }

        .btn-dark-success {
            background-color: #104d2a;
            color: #fff;
        }

        .btn-dark-success:hover {
            background-color: #104d2a;
            color: #fff;
        }

        .theme-form .form-group textarea {
            border-color: #c0c0c0 !important;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h2>Students<span></span></h2>
@endsection

@section('breadcrumb-items')
    <!-- <li class="breadcrumb-item">Tables</li>
                         <li class="breadcrumb-item">Extension Data Tables</li> -->
    <li class="breadcrumb-item active">Students</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 col-lg-9">
                                <h5>Students</h5>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <!-- Add Student Popup-->
                                {{-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Add Customers</button> --}}
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Add Students</h4>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form theme-form needs-validation"
                                                    action="{{ route('customers.store') }}" novalidat method="post">
                                                    @csrf
                                                    <div class="card-body">


                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Phone</label>
                                                                    <input class="form-control btn-pill digits"
                                                                        id="exampleFormControlInput1" type="tel"
                                                                        placeholder="Enter Phone" name="phone" required>
                                                                    <div class="invalid-feedback">Please provide a valid
                                                                        phone number.</div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Email</label>
                                                                    <input class="form-control btn-pill digits"
                                                                        id="exampleFormControlInput2" type="email"
                                                                        placeholder="name@example.com" name="email"
                                                                        required>
                                                                    <div class="invalid-feedback">Please provide a valid
                                                                        Email Address.</div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Parent's
                                                                        Name</label>
                                                                    <input class="form-control btn-pill"
                                                                        id="exampleFormControlInput3" type="text"
                                                                        placeholder="Enter Parents Name" name="parents_name"
                                                                        required>
                                                                    <div class="invalid-feedback">Please provide a valid
                                                                        Name.</div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Category</label>
                                                                    <select class="form-control col-sm-12" name="category"
                                                                        required>
                                                                        <option value="">Select an category</option>
                                                                        <option value="AL">Alabama</option>
                                                                        <option value="WY">Wyoming</option>
                                                                        <option value="WY">Coming</option>
                                                                        <option value="WY">Hanry Die</option>
                                                                        <option value="WY">John Doe</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">Please select a Category.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Timeslot
                                                                        Day</label>
                                                                    <select class="form-control col-sm-12"
                                                                        name="timeslot_day" required>
                                                                        <option value="AL">Monday</option>
                                                                        <option value="WY">Tuesday</option>
                                                                        <option value="WY">Wednesday</option>
                                                                        <option value="WY">Thursday</option>
                                                                        <option value="WY">Friday</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5"
                                                                        required>Time</label>
                                                                    <input type="time" class="form-control"
                                                                        name="time" id="time">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Date of
                                                                        Bitrh</label>
                                                                    <input type="date" class="form-control required"
                                                                        name="date" id="date">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Gender</label>
                                                                    <select class="form-control col-sm-12" name="gender">
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="not_say">Rather not say</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlInput5">Status</label>
                                                                    <select class="form-control col-sm-12" name="status">
                                                                        <option value="Active">Active</option>
                                                                        <option value="Inactive">Inactive</option>
                                                                        <option value="Trial">Trial</option>
                                                                        <option value="Lead">Lead</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-4">
                                                                    <input type="checkbox" name="lesson" id="lesson">
                                                                    Lesson
                                                                    Policy
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button class="btn btn-pill btn-primary"
                                                            type="submit">Submit</button>
                                                        <input class="btn btn-pill btn-light" type="reset"
                                                            value="Cancel">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5 d-flex col-lg-10 col-sm-3 m-2" style="gap: 10px;">
                                <input type="search" class="form-control" placeholder="Quick Search"
                                    aria-controls="responsive">
                                <button class="btn btn-primary" style="width: 70%;" type="button" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Add Student</button>
                                <select class="form-control form-control-inverse-fill btn-square" name="select">
                                    <option value="opt1">Actions</option>
                                    <option value="email_student">Email Student</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="trial">Trial</option>
                                    <option value="lead">Lead</option>
                                    <option value="delete">Delete</option>
                                </select>
                                <select id="status" class="js-example-basic-single col-sm-12">
                                    <optgroup label="Status">
                                        <option value="AL">
                                            <span class="checkbox-container">
                                                <span class="checkbox"></span>
                                            </span>
                                            Show All
                                        </option>
                                        <option value="WY">
                                            <span class="checkbox-container">
                                                <span class="checkbox checked"></span>
                                            </span>
                                            Show ACTIVE Only
                                        </option>
                                        <option value="WY">
                                            <span class="checkbox-container">
                                                <span class="checkbox"></span>
                                            </span>
                                            Show INCTIVE Only
                                        </option>
                                        <option value="WY">
                                            <span class="checkbox-container">
                                                <span class="checkbox"></span>
                                            </span>
                                            Show TRIAL Only
                                        </option>
                                        <option value="WY">
                                            <span class="checkbox-container">
                                                <span class="checkbox"></span>
                                            </span>
                                            Show LEAD Only
                                        </option>
                                    </optgroup>
                                </select>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="bg-light">
                                        <th scope="col"><input id="checkbox-primary-1" type="checkbox"></th>
                                        <th scope="col">ID#</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Customer's Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Next Lesson</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $item)
                                        <tr>
                                            <td><input id="checkbox-primary-1" type="checkbox"></td>
                                            <td>{{ $item->id }}</td>
                                            <td><span class="badge badge-success">{{ $item->status }}</span></td>
                                            <td data-toggle="modal"
                                                data-target=".bd-student-popup-modal-lg{{ $item->id }}">
                                                {{ $item->parents_name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->time }}</td>
                                        </tr>
                                        <!-- Edit Student Popup Start -->
                                        <div class="modal fade bd-student-popup-modal-lg{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                            {{ $item->parents_name }}</h4>
                                                        <div class="">
                                                            <button class="btn btn-primary btn-sm" type="button"
                                                                data-toggle="modal" data-target=".repertoire">
                                                                Repertoire
                                                            </button>
                                                            <button class="btn btn-dark-success btn-sm" type="button"
                                                                data-toggle="modal" data-target=".appt_logs">Appt
                                                                Logs</button>
                                                            <button class="btn btn-success btn-sm">Payment Method</button>
                                                            <button class="btn btn-danger btn-sm">Invoice</button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form theme-form"
                                                            action="{{ route('customers.update', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label
                                                                                for="exampleFormControlInput5">Phone</label>
                                                                            <input class="form-control btn-pill digits"
                                                                                id="exampleFormControlInput1"
                                                                                type="tel" placeholder="Enter Phone"
                                                                                name="phone"
                                                                                value="{{ $item->phone }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label
                                                                                for="exampleFormControlInput5">Email</label>
                                                                            <input class="form-control btn-pill"
                                                                                id="exampleFormControlInput2"
                                                                                type="email"
                                                                                placeholder="name@example.com"
                                                                                name="email"
                                                                                value="{{ $item->email }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label for="exampleFormControlInput5">Parent's
                                                                                Name</label>
                                                                            <input class="form-control btn-pill"
                                                                                id="exampleFormControlInput3"
                                                                                type="text"
                                                                                placeholder="Enter Last Name"
                                                                                name="parents_name"
                                                                                value="{{ $item->parents_name }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label
                                                                                for="exampleFormControlInput5">Category</label>
                                                                            <select class="form-control col-sm-12"
                                                                                name="category">
                                                                                <option value="AL"
                                                                                    {{ $item->category == 'AL' ? 'selected' : '' }}>
                                                                                    Alabama</option>
                                                                                <option value="WY"
                                                                                    {{ $item->category == 'WY' ? 'selected' : '' }}>
                                                                                    Wyoming</option>
                                                                                <option value="CO"
                                                                                    {{ $item->category == 'CO' ? 'selected' : '' }}>
                                                                                    Coming</option>
                                                                                <option value="HD"
                                                                                    {{ $item->category == 'HD' ? 'selected' : '' }}>
                                                                                    Hanry Die</option>
                                                                                <option value="JD"
                                                                                    {{ $item->category == 'JD' ? 'selected' : '' }}>
                                                                                    John Doe</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label for="exampleFormControlInput5">Timeslot
                                                                                Day</label>
                                                                            <select class="form-control col-sm-12"
                                                                                name="timeslot_day">
                                                                                <option value="Monday"
                                                                                    {{ $item->status == 'Monday' ? 'selected' : '' }}>
                                                                                    Monday</option>
                                                                                <option value="Tuesday"
                                                                                    {{ $item->status == 'Tuesday' ? 'selected' : '' }}>
                                                                                    Tuesday</option>
                                                                                <option value="Wednesday"
                                                                                    {{ $item->status == 'Wednesday' ? 'selected' : '' }}>
                                                                                    Wednesday</option>
                                                                                <option value="Thursday"
                                                                                    {{ $item->status == 'Thursday' ? 'selected' : '' }}>
                                                                                    Thursday</option>
                                                                                <option value="Friday"
                                                                                    {{ $item->status == 'Friday' ? 'selected' : '' }}>
                                                                                    Friday</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label
                                                                                for="exampleFormControlInput5">Time</label>
                                                                            <input type="time" class="form-control"
                                                                                name="time" id="time"
                                                                                value="{{ $item->time }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label for="exampleFormControlInput5">Date of
                                                                                Bitrh</label>
                                                                            <input type="date" class="form-control"
                                                                                name="date" id="date"
                                                                                value="{{ $item->birthdate }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label
                                                                                for="exampleFormControlInput5">Gender</label>
                                                                            <select class="form-control col-sm-12"
                                                                                name="gender">
                                                                                <option value="male"
                                                                                    {{ $item->gender == 'male' ? 'selected' : '' }}>
                                                                                    Male</option>
                                                                                <option value="female"
                                                                                    {{ $item->gender == 'female' ? 'selected' : '' }}>
                                                                                    Female</option>
                                                                                <option value="not_say"
                                                                                    {{ $item->gender == 'not_say' ? 'selected' : '' }}>
                                                                                    Rather not say</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <label
                                                                                for="exampleFormControlInput5">Status</label>
                                                                            <select class="form-control col-sm-12"
                                                                                name="status">
                                                                                <option value="Active"
                                                                                    {{ $item->status == 'Active' ? 'selected' : '' }}>
                                                                                    Active</option>
                                                                                <option value="Inactive"
                                                                                    {{ $item->status == 'Inactive' ? 'selected' : '' }}>
                                                                                    Inactive</option>
                                                                                <option value="Trial"
                                                                                    {{ $item->status == 'Trial' ? 'selected' : '' }}>
                                                                                    Trial</option>
                                                                                <option value="Lead"
                                                                                    {{ $item->status == 'Lead' ? 'selected' : '' }}>
                                                                                    Lead</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-4">
                                                                            <input type="checkbox" name="lesson"
                                                                                id="lesson"> Lesson
                                                                            Policy
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                            <div class="card-footer p-2 text-right">
                                                                <button class="btn btn-pill btn-light " type="button"
                                                                    data-dismiss="modal" aria-label="Close">Close</button>
                                                                <button class="btn btn-pill btn-primary"
                                                                    type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Edit Student Popup end -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <!-- Repertoire Model -->
                    <div class="modal fade repertoire" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">John San</h4>
                                    <div class="">
                                        <button class="btn btn-primary btn-sm" type="button" onclick="showForm('.repertoireForm')">
                                            Repertoire
                                        </button>
                                        <button class="btn btn-dark-success btn-sm" type="button" onclick="showForm('.aptLogsForm')">Appt Logs</button>
                                        <button class="btn btn-success btn-sm" type="button" onclick="showForm('.paymentMethodForm')">Payment Method</button>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="showForm('.invoiceForm')">Invoice</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    {{-- <form class="form theme-form">

                                    </form> --}}


                                    {{-- Repertoire start--}}
                                    <form class="form theme-form repertoireForm" style="height: 90vh;">
                                       <div class="card-body" style="display: ; height: 80vh;">
                                            <div class="card-title">Add Repertoire</div>
                                            <div class="form-group">
                                                <label class="form-label text-center w-100">Upload a File</label>
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <div class="dropzone P-4 digits" id="singleFileUpload"
                                                            action="/upload.php">
                                                            <div class="dz-message needsclick"><i
                                                                    class="icofont icofont-volume-bar"></i>
                                                                <h6></h6><span class="note needsclick">Audio File</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="dropzone P-4 digits" id="singleFileUpload"
                                                            action="/upload.php">
                                                            <div class="dz-message needsclick"><i
                                                                    class="icofont icofont-file-text"></i>
                                                                <h6></h6><span class="note needsclick">PDF File </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="dropzone P-4 digits" id="singleFileUpload"
                                                            action="/upload.php">
                                                            <div class="dz-message needsclick"><i
                                                                    class="icofont icofont-image"></i>
                                                                <h6></h6><span class="note needsclick">JPG File</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Notes</label>
                                                <textarea name="notes" id="notes" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right p-2">
                                            <button class="btn btn-pill btn-light" type="button" data-dismiss="modal"
                                                aria-label="Close">Close</button>
                                            <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                    {{-- Appt Logs start --}}
                                    <form class="form theme-form aptLogsForm" style="display: none; height: 90vh;">
                                        <div class="card-body" style="display: ; height: 80vh;">
                                            <div class="card-title">Add Repertoire</div>
                                            <div class="form-group">
                                                <label class="form-label text-center w-100">Upload a File</label>
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group mb-4">
                                                            <input type="date" class="form-control"
                                                                    name="date" id="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group mb-4">
                                                            <input type="date" class="form-control"
                                                                    name="date" id="date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right p-2">
                                            <button class="btn btn-pill btn-light" type="button" data-dismiss="modal"
                                                aria-label="Close">Close</button>
                                            <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                    {{-- Payment Method start --}}
                                    <form class="form theme-form paymentMethodForm" style="display: none;height: 90vh;">
                                        <div class="card-body" style="display: ; height: 80vh;">
                                            <h2> Payment Method</h2>
                                            <!-- Payment Method form content -->
                                        </div>
                                    </form>
                                    {{-- Invoice start --}}
                                    <form class="form theme-form invoiceForm" style="display: none;height: 90vh;">
                                        <div class="card-body" style="display: ; height: 80vh;">
                                         <h2> Invoice form</h2>
                                        <!-- Invoice form content -->
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repertoire Model -->


                    <!-- appt logs Model -->
                    <div class="modal fade appt_logs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">John San</h4>
                                    <div class="">
                                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                            data-target=".repertoire">
                                            Repertoire
                                        </button>
                                        <button class="btn btn-dark-success btn-sm">Appt Logs</button>
                                        <button class="btn btn-success btn-sm">Payment Method</button>
                                        <button class="btn btn-danger btn-sm">Invoice</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form class="form theme-form">
                                        <div class="card-body" style="height: 100%;">
                                            <div class="card-title">Add Repertoire</div>
                                            <label for="" class="form-label">Appt Logs</label>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <input type="date" name="start_date" class="form-control">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input type="date" name="end_date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right p-2">
                                            <button class="btn btn-pill btn-light" type="button" data-dismiss="modal"
                                                aria-label="Close">Close</button>
                                            <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repertoire Model -->
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ url('assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
    <script src="{{ route('/') }}/assets/js/time-picker/jquery-clockpicker.min.js"></script>
    <script src="{{ route('/') }}/assets/js/time-picker/highlight.min.js"></script>
    <script src="{{ route('/') }}/assets/js/time-picker/clockpicker.js"></script>
    <script src="{{ route('/') }}/assets/js/script.js"></script>

    <script>
        document.querySelectorAll('#status option').forEach(option => {
            option.addEventListener('click', () => {
                const checkbox = option.querySelector('.checkbox');
                checkbox.classList.toggle('checked');
            });
        });
    </script>
    <script>
    function showForm(formClass) {
        $('.form').hide();
        $(formClass).show();
    }
</script>

    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('.js-example-placeholder-multiple').select2();
        });
    </script>
    {{-- <script src="{{route('/')}}/assets/js/datatable/datatable-extension/custom.js"></script> --}}
@endsection
