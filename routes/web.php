<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CalenderController;

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return redirect()->route('default');
})->name('/');

Route::view('layout-light', 'starterkit.layout-light')->name('layout-light');
Route::view('layout-dark', 'starterkit.layout-dark')->name('layout-dark');
Route::view('sidebar-fixed', 'starterkit.sidebar-fixed')->name('sidebar-fixed');
Route::view('boxed', 'starterkit.boxed')->name('boxed');
Route::view('layout-rtl', 'starterkit.layout-rtl')->name('layout-rtl');
Route::view('vertical', 'starterkit.vertical')->name('vertical');
Route::view('mega-menu', 'starterkit.mega-menu')->name('mega-menu');
// Route::view('calender', 'calender.index')->name('calender');
Route::view('services', 'services.index')->name('services');
Route::view('customers', 'customers.index')->name('customers');
Route::view('staff', 'staff.index')->name('staff');
Route::view('appointments', 'appointments.index')->name('appointments');
Route::get('calender', [App\Http\Controllers\CalenderController::class, 'index'])->name('calender');


Route::prefix('dashboard')->group(function () {
	Route::view('/', 'dashboard.index')->name('default');
	Route::view('crypto', 'dashboard.crypto')->name('crypto');
	Route::view('ecommerce', 'dashboard.ecommerce')->name('ecommerce');
});

