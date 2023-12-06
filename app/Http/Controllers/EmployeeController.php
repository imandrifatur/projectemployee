<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $searchNip = $request->input('searchNip');
        $searchName = $request->input('searchName');

        // Query untuk mendapatkan data karyawan
        $employeesQuery = Employee::orderBy('nip', 'asc');

        // Tambahan filter berdasarkan pencarian NIP
        if ($searchNip) {
            $employeesQuery->where('nip', 'like', '%' . $searchNip . '%');
        }

        // Tambahan filter berdasarkan pencarian Nama
        if ($searchName) {
            $employeesQuery->where('employee_name', 'like', '%' . $searchName . '%');
        }

        // Mendapatkan hasil query
        $employees = $employeesQuery->get();

        return view('employees.index', compact('employees', 'searchNip', 'searchName'));
    }
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:employees',
            'employee_name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nip' => 'required|unique:employees,nip,' . $employee->id,
            'employee_name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
