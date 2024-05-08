<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    public function index()
	{

// 		$locations	= Location::fetchAll();
		$services	= DB::select('select * from staging_39C_bkntc_services');  
		// $staffs		= Staff::all();
    $staffs = DB::select('select * from staging_39C_bkntc_staff');
		// dd($services);
// 		$payments   = Helper::getPaymentStatuses();
// 		$statuses   = Helper::getAppointmentStatuses();
// 		$customers	= SELECT * FROM `staging_39C_bkntc_customers`;
		$customers = DB::select('SELECT * FROM `staging_39C_bkntc_customers`');
        
		return view( 'calender.index' , [
// 			'locations'	=> $locations,
			'services'	=> $services,
			'staffs'		=> $staffs,
// 			'statuses'  => $statuses,
// 			'payments'  => $payments,
			'customers'		=> $customers
		] );
	}
}
