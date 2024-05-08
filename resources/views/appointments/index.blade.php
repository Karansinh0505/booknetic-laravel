@extends('layouts.light.master')
@section('title', 'Appointments')

@section('css')
<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/datatables.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
	<h2>Appointments <span>  </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Appointments</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      
      <!-- Zero Configuration  Starts-->
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>Appointments</h5>
               <!-- <span>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</span> -->
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Office</th>
                           <th>Age</th>
                           <th>Start date</th>
                           <th>Salary</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Tiger Nixon</td>
                           <td>System Architect</td>
                           <td>Edinburgh</td>
                           <td>61</td>
                           <td>2011/04/25</td>
                           <td>$320,800</td>
                        </tr>
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      
      
      <!-- </div> -->
   </div>
</div>
@endsection

@section('script')
<script src="{{route('/')}}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="{{route('/')}}/assets/js/datatable/datatables/datatable.custom.js"></script>
@endsection