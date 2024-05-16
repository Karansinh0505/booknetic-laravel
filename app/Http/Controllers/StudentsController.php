<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('customers.index', ['students' => $students]);
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'phone' => 'required|digits:10', // Example validation rules, adjust as needed
        //     'email' => 'required|email',
        //     'parents_name' => 'required|string',
        //     'category' => 'required|string',
        //     'timeslot_day' => 'required|string',
        //     'time' => 'nullable|date_format:H:i', // Assuming time is optional but if provided, should be in format HH:MM
        //     'date' => 'nullable|date', // Assuming date is optional but if provided, should be in format YYYY-MM-DD
        //     'gender' => 'nullable|string|in:male,female,not_say', // Assuming gender is optional but if provided, should be one of these values
        //     'status' => 'nullable|string|in:active,inactive,trial,lead', // Assuming status is optional but if provided, should be one of these values
        //     'lesson' => 'nullable|boolean', // Assuming lesson is optional and a boolean value
        // ]);

        // Create a new customer record with the validated data
        $customer = new Students();
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->parents_name = $request->parents_name;
        $customer->category = $request->category;
        $customer->timeslot_day = $request->timeslot_day;
        $customer->time = $request->time;
        $customer->birthdate = $request->date;
        $customer->gender = $request->gender;
        $customer->status = $request->status;

        // Save the customer record
        $customer->save();

        // Redirect back or to a success page
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'phone' => 'required|digits:10',
        //     'email' => 'required|email',
        //     'parents_name' => 'required|string',
        //     'category' => 'required|string',
        //     'timeslot_day' => 'required|string',
        //     'time' => 'nullable|date_format:H:i',
        //     'date' => 'nullable|date',
        //     'gender' => 'nullable|string|in:male,female,not_say',
        //     'status' => 'nullable|string|in:Active,Inactive,Trial,Lead',
        //     'lesson' => 'nullable|boolean',
        // ]);

        // Find the customer record by ID
        $customer = Students::findOrFail($id);

        // Update the customer record with the validated data
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->parents_name = $request->parents_name;
        $customer->category = $request->category;
        $customer->timeslot_day = $request->timeslot_day;
        $customer->time = $request->time;
        $customer->birthdate = $request->date;
        $customer->gender = $request->gender;
        $customer->status = $request->status;

        // Save the updated customer record
        $customer->save();

        // Redirect back or to a success page
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

}
