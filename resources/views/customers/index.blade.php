@extends('layouts.light.master')
@section('title', 'Customers')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/datatable-extension.css"> --}}
<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/select2.css">
@endsection

@section('style')
<style>
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
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Add Students</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form theme-form">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput5">First Name</label>
                                                                <input class="form-control btn-pill" id="exampleFormControlInput11" type="text" placeholder="Enter First Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput5">Last Name</label>
                                                                <input class="form-control btn-pill" id="exampleFormControlInput12" type="text" placeholder="Enter Last Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput5">Phone</label>
                                                                <input class="form-control btn-pill digits" id="exampleFormControlInput13" type="tel" placeholder="Enter Phone">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect7">Gender</label>
                                                                <select class="form-control btn-pill digits" id="exampleFormControlSelect14">
                                                                    <option>Female</option>
                                                                    <option>Male</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput5">Birthdate</label>
                                                                <input class="form-control btn-pill digits" id="exampleFormControlInput15" type="date" placeholder="Enter Phone">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput5">Email address</label>
                                                                <input class="form-control btn-pill" id="exampleFormControlInput16" type="email" placeholder="name@example.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword6">Password</label>
                                                                <input class="form-control btn-pill" id="exampleInputPassword17" type="password" placeholder="Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                                                    <input class="btn btn-pill btn-light" type="reset" value="Cancel">
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
                            <input type="search" class="form-control" placeholder="Quick Search" aria-controls="responsive">
                            <button class="btn btn-primary" style="width: 70%;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button>
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
                                <tr>
                                    <td><input id="checkbox-primary-1" type="checkbox"></td>
                                    <td>1</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td data-toggle="modal" data-target=".bd-student-popup-modal-lg">John San</td>
                                    <td>9123123123</td>
                                    <td>johnsan@gmail.com</td>
                                    <td>Piano</td>
                                    <td>03/15/2024</td>
                                </tr>
                                <tr>
                                    <td><input id="checkbox-primary-2" type="checkbox"></td>
                                    <td data-toggle="modal" data-target=".bd-student-popup-modal-lg">2</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td>Maria Jusko</td>
                                    <td>9321321321</td>
                                    <td>mariaj@gmail.com</td>
                                    <td>Guitar</td>
                                    <td>03/21/2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Edit Student Popup Start -->
                <div class="modal fade bd-student-popup-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">John San</h4>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="form theme-form">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput5">Phone</label>
                                                    <input class="form-control btn-pill digits" id="exampleFormControlInput1" type="tel" placeholder="Enter Phone">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput5">Email</label>
                                                    <input class="form-control btn-pill" id="exampleFormControlInput2" type="email" placeholder="name@example.com">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput5">Parent's Name</label>
                                                    <input class="form-control btn-pill" id="exampleFormControlInput3" type="text" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <div class="col-form-label">Category</div>
                                                    <select class="form-control col-sm-12">
                                                        <option value="AL">Alabama</option>
                                                        <option value="WY">Wyoming</option>
                                                        <option value="WY">Coming</option>
                                                        <option value="WY">Hanry Die</option>
                                                        <option value="WY">John Doe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <div class="col-form-label">Timeslot Day</div>
                                                    <select class="form-control col-sm-12">
                                                        <option value="AL">Monday</option>
                                                        <option value="WY">Tuesday</option>
                                                        <option value="WY">Wednesday</option>
                                                        <option value="WY">Thursday</option>
                                                        <option value="WY">Friday</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput5">Parent's Name</label>
                                                    <input class="form-control btn-pill" id="exampleFormControlInput5" type="text" placeholder="Enter Last Name">
                                                </div>
                                            </div> --}}
                                        </div>

                                        
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                                        <input class="btn btn-pill btn-light" type="reset" value="Cancel">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- Edit Student Popup end -->
            </div>


        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script src="{{route('/')}}/assets/js/select2/select2.full.min.js"></script>
<script src="{{route('/')}}/assets/js/select2/select2-custom.js"></script>
<script>
    // Add click event listener to each option to toggle checkbox
    document.querySelectorAll('#status option').forEach(option => {
        option.addEventListener('click', () => {
            const checkbox = option.querySelector('.checkbox');
            checkbox.classList.toggle('checked');
        });
    });

</script>
 <script>
        // Initialize Select2
        $(document).ready(function() {
            $('.js-example-placeholder-multiple').select2();
        });
    </script>
{{-- <script src="{{route('/')}}/assets/js/datatable/datatable-extension/custom.js"></script> --}}
@endsection
