@extends('layouts.light.master')
@section('title', 'Booknetic')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
    <!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">

<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/daterange-picker.css">
@endsection

@section('style')
<style>
    input.form-control.digits.button.btn-primary {
    color: white !important;
}
</style>
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
   <li class="breadcrumb-item">Dashboard</li>
<!--	<li class="breadcrumb-item active">Default</li>-->
@endsection

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
            <div class="row">
              
              <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card">
                  <div class="card-header">
                        <div class="row">
                            <div class="col-xl-2 col-sm-2">
                                <input class="datepicker-here form-control digits button btn-primary" value="Day" type="text" data-multiple-dates="3" data-multiple-dates-separator=", " data-language="en">
                            </div>
                        
                            <div class="col-xl-2 col-sm-2">
                                  <div class="form-group">
                                     <input class="form-control digits button btn-primary" type="text" name="daterange" value="Week">
                                  </div>
                            </div>
                            
                            <div class="col-sm-2 col-xl-2">
                                <input class="datepicker-here form-control digits button btn-primary" type="text" data-language="en" data-min-view="months" data-view="months" value="Month" data-date-format="MM yyyy">
                            </div>
                            
                            <div class="col-sm-2 col-xl-2">
                                <input class="datepicker-here form-control digits button btn-primary" value="Year" type="text" data-language="en" data-min-view="months" data-view="months" value="Month" data-date-format="MM yyyy">
                            </div>
                            
                            <div class="col-xl-2 col-sm-2">
                                <input class="datepicker-here form-control digits button btn-primary" value="Range" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en">
                            </div>
                        </div>
                  </div>
                  <div class="card-body p-0">
                    <div id="column-chart"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('script')
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>


    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
    
    
    <script src="{{route('/')}}/assets/js/datepicker/daterange-picker/moment.min.js"></script>
    <script src="{{route('/')}}/assets/js/datepicker/daterange-picker/daterangepicker.js"></script>
    <script src="{{route('/')}}/assets/js/datepicker/daterange-picker/daterange-picker.custom.js"></script>
    <script>
          $(document).ready(function () {
            $('#year-picker').datepicker({
              format: 'yyyy',
              viewMode: 'years',
              minViewMode: 'years'
            });
    </script>
@endsection

