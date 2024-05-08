@extends('layouts.light.master')
@section('title', 'Calendar')

@section('css')
<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/calendar.css">
{{-- for the select dropdown --}}
<link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/select2.css">
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" rel="stylesheet" >-->
<link href="{{ route('/') }}/assets/css/calendar.css" rel="stylesheet" />
<link href="{{ route('/') }}/assets/js/fullcalendar/packages/core/main.css" rel="stylesheet" />
<link href="{{ route('/') }}/assets/js/fullcalendar/packages/daygrid/main.css" rel="stylesheet" />
<link href="{{ route('/') }}/assets/js/fullcalendar/packages/timegrid/main.css" rel="stylesheet" />
<link href="{{ route('/') }}/assets/js/fullcalendar/packages/list/main.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/bootstrap-datepicker.css" />

@endsection

@section('style')
<style>

.btn-ctm{
    padding-left: 10px !important;
    padding-right: 10px !important;
}
    .table-bordered td,
    .table-bordered th {
        font-size: 12px;
    }
    
    .table-bordered td, .table-bordered th {
    border-color: #000!important;
}

    .table-bordered td:nth-child(1) {}

    #infinite-scroll-container {
        display: flex;
        flex-wrap: nowrap;
        /* Ensures all items are in a single row */
        overflow-x: auto;
        /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch;
        /* Smooth scrolling on iOS devices */
        padding-bottom: 20px;
        /* Add some space to the bottom for the scroll bar */
    }
</style>
@endsection
@section('breadcrumb-title')
	<h2>Calendar</h2>
@endsection

@section('breadcrumb-items')
	{{-- <li class="breadcrumb-item">Apps</li>
    <li class="breadcrumb-item">User</li> --}}
	<li class="breadcrumb-item active">Calendar</li>
@endsection
@section('content')
<div class="m_header ">
    <div class="m_head_title">
        <!--<div class="m_head_title_text">Calendar</div>-->
                  
                  <div class="m_head_new_tools" id="fs-calendar-new-layout">
            <div id='fs-calendar-toolbar'>
                <div class="fc-toolbar fc-header-toolbar">
                    <div class="fc-left">
                        <div class="fc-button-group">
                            <button type="button" class="fc-prev-button fc-prev-button-display fc-button btn btn-primary" aria-label="prev"><span class="fc-icon fc-icon-chevron-left"></span></button>
                            <button type="button" class="fc-today-button fc-today-button-display fc-button btn btn-primary" disabled=""><?php echo date("F d, Y"); ?></button>
                            <button type="button" class="fc-next-button fc-next-button-display fc-button btn btn-primary" aria-label="next"><span class="fc-icon fc-icon-chevron-right"></span></button>
                        </div>
                    </div>
                    <div class="fc-center">
                        <h2 class="calendar-date-display"><?php echo date("F Y"); ?></h2>
                    </div>
                    <div class="fc-left">
                        <div class="fc-button-group">
                            <div class="dropdown">
                                <button class="btn btn-lg btn-primary dropdown-toggle view-calendar-dropdown-button" type="button" id="viewCalendarDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-calendar fa-lg"></i><span class="view-calendar-dropdown-text">Select</span>
                                </button>

                                <ul class="dropdown-menu view-calendar-menu" aria-labelledby="viewCalendarDropdownButton">
                                    <li>
                                        <a class="dropdown-item dropdown-item-month">Month<span class="item-icon"></span></a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li>
                                                <div class="form-group">
                                                    <div class="input-group input-month-group">
                                                        <?php
                                                        $today = date("m/d/Y");
                                                        $firstDayOfMonth = date("m/01/Y", strtotime($today));
                                                        $lastDayOfMonth = date("m/t/Y", strtotime($today));
                                                        ?>
                                                        <input type="text" name="daterange_month" class="input-date form-control" id="daterange_month" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="<?php echo $firstDayOfMonth . ' - ' . $lastDayOfMonth; ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar fa-lg"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="dropdown-item dropdown-item-week">Week<span class="item-icon"></span></a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li>
                                                <div class="form-group">
                                                    <div class="input-group input-week-group">
                                                        <?php
                                                        $sunday = strtotime('next Sunday -1 week');
                                                        $sunday = date('w', $sunday) == date('w') ? strtotime(date("m/d/Y", $sunday) . " +7 days") : $sunday;
                                                        $saturday = strtotime(date("m/d/Y", $sunday) . " +6 days");
                                                        $this_week_sd = date("m/d/Y", $sunday) . "<br>";
                                                        $this_week_ed = date("m/d/Y", $saturday) . "<br>";
                                                        ?>
                                                        <input type="text" name="daterange_week" class="input-date form-control" id="daterange_week" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="<?php echo $this_week_sd . ' - ' . $this_week_ed; ?>">

                                                        <?php
                                                        // $today = new DateTime();
                                                        // $start_of_week = clone $today;
                                                        // $start_of_week->modify('last sunday');
                                                        // $end_of_week = clone $start_of_week;
                                                        // $end_of_week->modify('+6 days');
                                                        // $date_range = $today->format('m/d/Y') . ' - ' . $end_of_week->format('m/d/Y');
                                                        ?>

                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar fa-lg"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="dropdown-item dropdown-item-day">Day<span class="item-icon"></span></a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" name="date_today" id="date_today" class="input-date form-control" placeholder="mm/dd/yyyy" value="<?php echo date("m/d/Y"); ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar fa-lg"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item dropdown-item-list">List</a></li>
                                    <li><a class="dropdown-item dropdown-item-grid test" id="target">Grid</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m_head_actions flex-column flex-md-row">
        <div class="d-flex">
            <div class="advanced_filters">
                <div class="advanced_filters_btn action_btn">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M5 10H15M2.5 5H17.5M7.5 15H12.5" stroke="#ADBFC7" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> -->
                    <!-- <span><?php //echo \bkntc__( 'Advanced filter' ) 
                                ?></span> -->
                    Search Filter
                    <span class="search_filter_arrow_down"></span>
                    <!-- <div class="filter_status">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                            <circle cx="4.5" cy="4.5" r="4.5" fill="#F33666"/>
                        </svg>
                    </div> -->
                </div>
                <div class="advanced_filters_popover">
                    <!-- <div class="advanced_filters_popover_head">
                        <span><?php //echo \bkntc__( 'Advanced filter' ) 
                                ?></span>
                        <div class="close_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div> -->
                    <div class="advanced_filters_popover_body">
                        <div class="filters">
                            <div class="filter">
                                <div class="filter_title">Student</div>
                                <div>
                                    <select class="form-control" multiple="multiple" id="calendar_customer_filter">
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                            {{ $customer->first_name." ".$customer->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="clear_select">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <!-- <div class="filter_title"><?php //echo \bkntc__( 'Staff' ) 
                                                                ?></div> -->
                                <div class="filter_title">Teacher</div>
                                <div>
                                    <!-- <select class="form-control" multiple="multiple" data-placeholder="<?php //echo bkntc__('Select')
                                                                                                            ?>" id="calendar_staff_filter"> -->
                                    <select class="form-control" multiple="multiple" id="calendar_staff_filter">
                                       @foreach($staffs as $staff)
                                            <option value="{{ $staff->id }}">
                                                {{ $staff->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="clear_select">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="filter">
                                <div class="filter_title"><?php //echo \bkntc__( 'Location' ) 
                                                            ?></div>
                                <div>
                                    <select class="form-control" multiple="multiple" data-placeholder="<?php //echo bkntc__('Select')
                                                                                                        ?>" id="calendar_location_filter">
	                                    <?php //foreach ( $parameters[ 'locations' ] as $location ): 
                                        ?>
                                            <option value="<?php //echo (int) $location[ 'id' ] 
                                                            ?>">
			                                    <?php //echo htmlspecialchars( $location[ 'name' ] ) 
                                                ?>
                                            </option>
	                                    <?php //endforeach; 
                                        ?>
                                    </select>
                                    <div class="clear_select">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div> -->
                            <div class="filter">
                                <!-- <div class="filter_title"><?php //echo \bkntc__( 'Service' ) 
                                                                ?></div> -->
                                <div class="filter_title">Category</div>
                                <div>
                                    <!-- <select class="form-control" multiple="multiple" data-placeholder="<?php //echo bkntc__('Select')
                                                                                                            ?>" id="calendar_service_filter"> -->
                                    <select class="form-control" multiple="multiple" id="calendar_service_filter">
                                        @foreach($services as $service)
                                            <option value=" {{ $service->id }}">
                                               {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="clear_select">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="filter">
                                <div class="filter_title"><?php //echo \bkntc__( 'Status' ) 
                                                            ?></div>
                                <div>
                                    <select class="form-control" multiple="multiple" data-placeholder="<?php //echo bkntc__('Select')
                                                                                                        ?>" id="calendar_status_filter">
                                        <?php //foreach ( $parameters[ 'statuses' ] as $status ): 
                                        ?>
                                            <option value="<?php //echo $status[ 'slug' ] 
                                                            ?>">
                                                <?php //echo htmlspecialchars( $status[ 'title' ] ) 
                                                ?>
                                            </option>
                                        <?php //endforeach; 
                                        ?>
                                    </select>
                                    <div class="clear_select">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="filter">
                                <div class="filter_title"><?php //echo \bkntc__( 'Payment' ) 
                                                            ?></div>
                                <div>
                                    <select class="form-control" multiple="multiple" data-placeholder="<?php //echo bkntc__('Select')
                                                                                                        ?>" id="calendar_payment_filter">
	                                    <?php //foreach ( $parameters[ 'payments' ] as $payment ): 
                                        ?>
                                            <option value="<?php //echo $payment[ 'slug' ] 
                                                            ?>">
			                                    <?php //echo htmlspecialchars( $payment[ 'title' ] ) 
                                                ?>
                                            </option>
	                                    <?php //endforeach; 
                                        ?>
                                    </select>
                                    <div class="clear_select">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M11.3332 4.6665L4.6665 11.3332M4.6665 4.6665L11.3332 11.3332" stroke="#98A2B3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div> -->
                            <div class="filter new_checkboxes_filter">
                                <input type="hidden" id="hide_appointments" value="N">
                                <input type="hidden" id="hide_unbooked_timeslots" value="N">
                                <input type="hidden" id="hide_unscheduled_teachers" value="N">
                                <input type="hidden" id="show_only_rescheduled_appointments" value="N">
                                <div>
                                    <input id="checkbox_hide_appointments" class="hide_appointments" type="checkbox">
                                    <label for="checkbox_hide_appointments" class="font-size-14 text-secondary">Hide Appointments</label>
                                </div>
                                <div>
                                    <input id="checkbox_hide_unbooked_timeslots" class="hide_unbooked_timeslots" type="checkbox">
                                    <label for="checkbox_hide_unbooked_timeslots" class="font-size-14 text-secondary">Hide Unbooked Timeslots</label>
                                </div>
                                <div>
                                    <input id="checkbox_hide_unscheduled_teachers" class="hide_unscheduled_teachers" type="checkbox">
                                    <label for="checkbox_hide_unscheduled_teachers" class="font-size-14 text-secondary">Hide Unscheduled Teachers</label>
                                </div>
                                <div>
                                    <input id="checkbox_show_only_rescheduled_appointments" class="show_only_rescheduled_appointments" type="checkbox">
                                    <label for="checkbox_show_only_rescheduled_appointments" class="font-size-14 text-secondary">Show Only Rescheduled Appointments</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="filter_actions">
                            <button class="clear_filters_btn"><?php //echo \bkntc__( 'Clear' ) 
                                                                ?></button>
                            <button class="save_filters_btn"><?php //echo \bkntc__( 'Save' ) 
                                                                ?></button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="create_new_appointment">
                <div class="create_new_appointment_btn action_btn">
                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">-->
                    <!--    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
                    <!--</svg>-->
                    <button class="btn btn-primary">New Appointment</span>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="fs-calendar-container">

    <div id='fs-calendar'>
        <!-- <div id='fs-calendar-toolbar'>
            <div class="fc-toolbar fc-header-toolbar">
                <div class="fc-left">
                    <div class="fc-button-group">
                        <button type="button" class="fc-prev-button fc-prev-button-display fc-button fc-button-primary" aria-label="prev"><span class="fc-icon fc-icon-chevron-left"></span></button>
                        <button type="button" class="fc-today-button fc-today-button-display fc-button fc-button-primary" disabled=""><?php //echo date("F d, Y");
                                                                                                                                        ?></button>
                        <button type="button" class="fc-next-button fc-next-button-display fc-button fc-button-primary" aria-label="next"><span class="fc-icon fc-icon-chevron-right"></span></button>
                    </div>
                </div>
                <div class="fc-center"><h2 class="calendar-date-display"><?php //echo date("F Y");
                                                                            ?></h2></div>
            </div>
        </div>
        
        <div id='fs-calendar-view-menu'>
            <div class="fc-toolbar fc-header-toolbar fc-new-header-toolbar">
                <div class="fc-left">
                    <div class="fc-button-group">
                        <div class="dropdown">
                            <button class="btn btn-lg btn-primary dropdown-toggle view-calendar-dropdown-button" type="button" id="viewCalendarDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-calendar fa-lg"></i><span class="view-calendar-dropdown-text">Select</span>
                            </button>

                            <ul class="dropdown-menu view-calendar-menu" aria-labelledby="viewCalendarDropdownButton">
                                <li>
                                    <a class="dropdown-item dropdown-item-month">Month<span class="item-icon"></span></a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li>
                                            <div class="form-group">
                                                <div class="input-group input-month-group">
                                                    <?php
                                                    // $today = date("m/d/Y");
                                                    // $firstDayOfMonth = date("m/01/Y", strtotime($today));
                                                    // $lastDayOfMonth = date("m/t/Y", strtotime($today));
                                                    ?>
                                                    <input type="text" name="daterange_month" class="input-date form-control" id="daterange_month" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="<?php //echo $firstDayOfMonth . ' - ' . $lastDayOfMonth; 
                                                                                                                                                                                                ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar fa-lg"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item dropdown-item-week">Week<span class="item-icon"></span></a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li>
                                        <div class="form-group">
                                                <div class="input-group input-week-group">
                                                <?php
                                                // $sunday = strtotime('next Sunday -1 week');
                                                // $sunday = date('w', $sunday)==date('w') ? strtotime(date("m/d/Y",$sunday)." +7 days") : $sunday;
                                                // $saturday = strtotime(date("m/d/Y",$sunday)." +6 days");
                                                // $this_week_sd = date("m/d/Y",$sunday)."<br>";
                                                // $this_week_ed = date("m/d/Y",$saturday)."<br>";
                                                ?>
                                                    <input type="text" name="daterange_week" class="input-date form-control" id="daterange_week" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="<?php //echo $this_week_sd . ' - ' . $this_week_ed; 
                                                                                                                                                                                                ?>">

                                                <?php
                                                // $today = new DateTime();
                                                // $start_of_week = clone $today;
                                                // $start_of_week->modify('last sunday');
                                                // $end_of_week = clone $start_of_week;
                                                // $end_of_week->modify('+6 days');
                                                // $date_range = $today->format('m/d/Y') . ' - ' . $end_of_week->format('m/d/Y');
                                                ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar fa-lg"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>            
                                </li>
                                <li>
                                    <a class="dropdown-item dropdown-item-day">Day<span class="item-icon"></span></a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="date_today" id="date_today" class="input-date form-control" placeholder="mm/dd/yyyy" value="<?php //echo date("m/d/Y");
                                                                                                                                                                            ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar fa-lg"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item dropdown-item-list">List</a></li>
                                <li><a class="dropdown-item dropdown-item-grid">Grid</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



        <div id='fs-calendar-view' class=""></div>

        <section class="d-none" id="grid-view">

            <!-- it's for grid view-->
            <div class="container-fluid p-5">
                <div class="row overflow-auto" id="infinite-scroll-container">
                    <?php  

                    if (!function_exists('getDatesForDayOfWeek')) {

                        function getDatesForDayOfWeek($year, $month, $dayOfWeek)
                        {
                            $dates = [];
                            $date = new DateTime("$year-$month-01");
                            while ($date->format('n') == $month) {
                                if ($date->format('N') == $dayOfWeek) {
                                    $formattedDate = $date->format('j/n'); // Format: Day/Month
                                    $dates[] = $formattedDate;
                                }
                                $date->modify('+1 day');
                            }
                            return $dates;
                        }
                    }

                    if (!function_exists('generateTableHeader')) {

                        // Function to generate table header for a specific day of the week
                        function generateTableHeader($dayOfWeek, $headerRowId)
                        {
                            echo '<tr id="' . $headerRowId . '">';
                            echo '<th>Time</th>';
                            echo '<th>Student Name</th>';
                            $dates = getDatesForDayOfWeek(2024, 4, $dayOfWeek); // April 2024
                            foreach ($dates as $date) {
                                echo '<th>' . $date . '</th>';
                            }
                            echo '</tr>';
                            $timeArray = array();
                            $start = strtotime('01:00');
                            $end = strtotime('08:30');

                            for ($i = $start; $i <= $end; $i += 900) {
                                $timeData = date('H:i', $i);
                                echo "<tr id='row-" . $timeData . "'>";
                                echo "<td>" . $timeData . "</td>";
                                echo "<td class='time-" . str_replace(':', '-', $timeData) . "'></td>";
                                foreach ($dates as $date) {
                                    echo "<td class='time-" . str_replace(':', '-', $timeData) . '-date-' . str_replace('/', '-', $date) . "'></td>";
                                }


                                echo "</tr>";
                            }
                        }
                    }
                        $staffArray = ['User User','asdasd','Jane Dee','John Doe','donk'];
                        foreach($staffArray as $staff){ 
                             ?>
                    <div class="col-md-6">
                        <div class="row d-flex align-items-center mb-3">



                            <!--<div class="col-md-3 d-flex justify-content-end ">-->
                            <!--    <div class="dropdown">-->
                            <!--        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                            <!--            TEACHER-->
                            <!--        </button>-->
                            <!--        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                            <!--            <a class="dropdown-item" href="#">NICHOLES G</a>-->
                            <!--            <a class="dropdown-item" href="#">CHASEN H</a>-->
                            <!--            <a class="dropdown-item" href="#">NICK M</a>-->
                            <!--            <a class="dropdown-item" href="#">PATRICK B</a>-->
                            <!--            <a class="dropdown-item" href="#">ISAAC L</a>-->
                            <!--            <a class="dropdown-item" href="#">MARY L</a>-->
                            <!--            <a class="dropdown-item" href="#">ANDREW G</a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="col-md-3">-->
                            <!--    <div class="dropdown">-->
                            <!--        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                            <!--            CATEGORY-->
                            <!--        </button>-->
                            <!--        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                            <!--            <a class="dropdown-item" href="#">DRUM</a>-->
                            <!--            <a class="dropdown-item" href="#">GUITAR</a>-->
                            <!--            <a class="dropdown-item" href="#">PIANO</a>-->
                            <!--            <a class="dropdown-item" href="#">UKULELE</a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->

                        </div>
                        <!-- Get Static grid data record taskdate-25-04 -->

                        <?php

                        


                        
                        ?>
                        <div class="col-md-12">
                            <div class="row d-flex align-items-center mb-3">

                            <div class="col-md-4 mt-3">
                                <p>MONDAY</p>
                            </div>

                            <div class="col-md-4 d-flex justify-content-end ">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TEACHER
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">NICHOLES G</a>
                                        <a class="dropdown-item" href="#">CHASEN H</a>
                                        <a class="dropdown-item" href="#">NICK M</a>
                                        <a class="dropdown-item" href="#">PATRICK B</a>
                                        <a class="dropdown-item" href="#">ISAAC L</a>
                                        <a class="dropdown-item" href="#">MARY L</a>
                                        <a class="dropdown-item" href="#">ANDREW G</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORY
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">DRUM</a>
                                        <a class="dropdown-item" href="#">GUITAR</a>
                                        <a class="dropdown-item" href="#">PIANO</a>
                                        <a class="dropdown-item" href="#">UKULELE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <table class="table table-bordered">
                            <?php generateTableHeader(1, 'headerRowMonday'); ?>
                        </table>
                        <div class="col-md-12 mt-3">
                            <div class="row d-flex align-items-center mb-3">

                            <div class="col-md-4 mt-3">
                                <p>TUESDAY</p>
                            </div>

                            <div class="col-md-4 d-flex justify-content-end">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TEACHER
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">NICHOLES G</a>
                                        <a class="dropdown-item" href="#">CHASEN H</a>
                                        <a class="dropdown-item" href="#">NICK M</a>
                                        <a class="dropdown-item" href="#">PATRICK B</a>
                                        <a class="dropdown-item" href="#">ISAAC L</a>
                                        <a class="dropdown-item" href="#">MARY L</a>
                                        <a class="dropdown-item" href="#">ANDREW G</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORY
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">DRUM</a>
                                        <a class="dropdown-item" href="#">GUITAR</a>
                                        <a class="dropdown-item" href="#">PIANO</a>
                                        <a class="dropdown-item" href="#">UKULELE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <table class="table table-bordered">
                            <?php generateTableHeader(2, 'headerRowTuesday'); ?>
                        </table>
                        <div class="col-md-12 mt-3">
                            <div class="row d-flex align-items-center mb-3">

                            <div class="col-md-4 mt-3">
                                <p>WEDNESDAY</p>
                            </div>

                            <div class="col-md-4 d-flex justify-content-end ">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TEACHER
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">NICHOLES G</a>
                                        <a class="dropdown-item" href="#">CHASEN H</a>
                                        <a class="dropdown-item" href="#">NICK M</a>
                                        <a class="dropdown-item" href="#">PATRICK B</a>
                                        <a class="dropdown-item" href="#">ISAAC L</a>
                                        <a class="dropdown-item" href="#">MARY L</a>
                                        <a class="dropdown-item" href="#">ANDREW G</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORY
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">DRUM</a>
                                        <a class="dropdown-item" href="#">GUITAR</a>
                                        <a class="dropdown-item" href="#">PIANO</a>
                                        <a class="dropdown-item" href="#">UKULELE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <table class="table table-bordered">
                            <?php generateTableHeader(3, 'headerRowWednesday'); ?>
                        </table>
                        <div class="col-md-12 mt-3">
                            <div class="row d-flex align-items-center mb-3">

                            <div class="col-md-4 mt-3">
                                <p>THURSDAY</p>
                            </div>

                            <div class="col-md-4 d-flex justify-content-end ">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TEACHER 
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">NICHOLES G</a>
                                        <a class="dropdown-item" href="#">CHASEN H</a>
                                        <a class="dropdown-item" href="#">NICK M</a>
                                        <a class="dropdown-item" href="#">PATRICK B</a>
                                        <a class="dropdown-item" href="#">ISAAC L</a>
                                        <a class="dropdown-item" href="#">MARY L</a>
                                        <a class="dropdown-item" href="#">ANDREW G</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORY
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">DRUM</a>
                                        <a class="dropdown-item" href="#">GUITAR</a>
                                        <a class="dropdown-item" href="#">PIANO</a>
                                        <a class="dropdown-item" href="#">UKULELE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <table class="table table-bordered">
                            <?php generateTableHeader(4, 'headerRowThursday'); ?>
                        </table>
                        <div class="col-md-12 mt-3">
                            <div class="row d-flex align-items-center mb-3">

                            <div class="col-md-4 mt-3">
                                <p>FRIDAY</p>
                            </div>

                            <div class="col-md-4 d-flex justify-content-end ">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TEACHER
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">NICHOLES G</a>
                                        <a class="dropdown-item" href="#">CHASEN H</a>
                                        <a class="dropdown-item" href="#">NICK M</a>
                                        <a class="dropdown-item" href="#">PATRICK B</a>
                                        <a class="dropdown-item" href="#">ISAAC L</a>
                                        <a class="dropdown-item" href="#">MARY L</a>
                                        <a class="dropdown-item" href="#">ANDREW G</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORY
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">DRUM</a>
                                        <a class="dropdown-item" href="#">GUITAR</a>
                                        <a class="dropdown-item" href="#">PIANO</a>
                                        <a class="dropdown-item" href="#">UKULELE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <table class="table table-bordered">
                            <?php generateTableHeader(5, 'headerRowFriday'); ?>
                        </table>
                        <div class="col-md-12 mt-3">
                            <div class="row d-flex align-items-center mb-3">

                            <div class="col-md-4 mt-3">
                                <p>SATURDAY</p>
                            </div>

                            <div class="col-md-4 d-flex justify-content-end ">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TEACHER
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">NICHOLES G</a>
                                        <a class="dropdown-item" href="#">CHASEN H</a>
                                        <a class="dropdown-item" href="#">NICK M</a>
                                        <a class="dropdown-item" href="#">PATRICK B</a>
                                        <a class="dropdown-item" href="#">ISAAC L</a>
                                        <a class="dropdown-item" href="#">MARY L</a>
                                        <a class="dropdown-item" href="#">ANDREW G</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-ctm btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORY
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">DRUM</a>
                                        <a class="dropdown-item" href="#">GUITAR</a>
                                        <a class="dropdown-item" href="#">PIANO</a>
                                        <a class="dropdown-item" href="#">UKULELE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <table class="table table-bordered">
                            <?php generateTableHeader(6, 'headerRowSaturday'); ?>
                        </table>
                        <!-- End Get Static grid data record taskdate-25-04 -->
                    </div>
                    <?php } ?>
                    
                </div>
            </div>


            <!-- end -->
        </section>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script type="application/javascript">



    // $(document).ready(function() {
    //     var container = $('#infinite-scroll-container');
    //     var colCount = 8; // Number of columns initially visible

    //     // // Function to append more columns when scroll reaches the end
    //     // function appendMoreColumns() {
    //     //     for (var i = 0; i < 8; i++) {
    //     //         container.append('<div class="col-6">New Column</div>'); // Add new columns
    //     //     }
    //     // }

    //     // Check if scroll reached the end, then append more columns
    //     container.scroll(function() {
    //         if (container[0].scrollWidth - container.scrollLeft() === container.outerWidth()) {
    //             appendMoreColumns();
    //         }
    //     });

    //     // Initial call to append columns
    //     appendMoreColumns();
    // });
    // Open dropdown when hover on grid button taskdate-24-04
    $(document).ready(function() {
        $('.view-calendar-dropdown-button , .view-calendar-menu').hover(
            function() {
                $('.view-calendar-menu').addClass('show');
            },
            function() {
                $('.view-calendar-menu').removeClass('show');
            }
        );
    });
    // End Open dropdown when hover on grid button taskdate-24-04
</script>

<script>
  // JavaScript to handle click event
  document.getElementById('target').addEventListener('click', function() {
    var gridView = document.getElementById('grid-view');
    if (gridView.classList.contains('d-none')) {
      // If the grid view is hidden, show it
      gridView.classList.remove('d-none');
    } else {
      // If the grid view is shown, hide it
      gridView.classList.add('d-none');
    }
  });
</script>

<script src="{{ route('/') }}/assets/js/fullcalendar/packages/core/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/interaction/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/daygrid/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/timegrid/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/list/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/resource-common/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/resource-daygrid/main.js"></script>
<script src="{{ route('/') }}/assets/js/fullcalendar/packages/resource-timegrid/main.js"></script>

<script type="application/javascript" src="{{ route('/') }}/assets/js/moment.min.js"></script>
<script type="application/javascript" src="{{ route('/') }}/assets/js/daterangepicker.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
<script type="application/javascript" src="{{ route('/') }}/assets/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.js"> </script>
<script src="{{ route('/') }}/assets/js/calendar.js"></script>

<script>
    
</script>
@endsection