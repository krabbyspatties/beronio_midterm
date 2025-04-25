<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function store(Request $request)
    {

        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'job_title' => 'required',
        ]);
        $employee = Employee::create($validated);

        return redirect()->route('dashboard')->with([
            'success' => 'Employee Added Successfully',
            'newEmployee' => $employee,
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('dashboard')->with('success_delete', 'Employee deleted successfully');

    }
    public function edit(Employee $employee)
    {
        return view('edit_employee', compact('employee'));
    }
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'job_title' => 'required',
        ]);

        // dd($validated);

        $employee->update($validated);
        return redirect()->route('dashboard')->with('success_edit', 'Employee updated Successfully');
    }
}

