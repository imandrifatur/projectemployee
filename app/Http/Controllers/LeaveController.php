<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_name = $request->input('search_name');
        $search_date = $request->input('search_date');

        // Query untuk mendapatkan data cuti
        $leavesQuery = Leave::with('employee')->orderBy('leave_date', 'asc');

        // Tambahan filter berdasarkan pencarian
        if ($search) {
            $leavesQuery->where('employee_nip', 'like', '%' . $search . '%');
        }

        if ($search_name) {
            $leavesQuery->whereHas('employee', function ($query) use ($search_name) {
                $query->where('employee_name', 'like', '%' . $search_name . '%');
            });
        }

        if ($search_date) {
            $leavesQuery->whereDate('leave_date', $search_date);
        }

        // Mendapatkan hasil query
        $leaves = $leavesQuery->get();

        return view('leaves.index', compact('leaves', 'search', 'search_name', 'search_date'));
    }
    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }

    // LeaveController.php

public function store(Request $request)
{
    $request->validate([
        'employee_nip' => 'required',
        'leave_date' => 'required|date',
        'duration' => 'required|numeric|min:1', // Pastikan duration lebih dari 0
        'description' => 'required',
    ]);

    $employeeNIP = $request->input('employee_nip');
    $leaveDate = Carbon::parse($request->input('leave_date'));
    $duration = $request->input('duration');
    $description = $request->input('description');

    // Tambahkan logika untuk menyimpan multiple record sesuai dengan durasi cuti
    for ($i = 0; $i < $duration; $i++) {
        $leave = new Leave();
        $leave->employee_nip = $employeeNIP;
        $leave->leave_date = $leaveDate->copy()->addDays($i);
        $leave->duration = 1; // Durasi diatur ke 1 untuk setiap hari
        $leave->description = $description;
        $leave->save();
    }

    return redirect()->route('leaves.index')->with('success', 'Leave(s) added successfully.');
}


    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    public function edit(Leave $leave)
    {
        $employees = Employee::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, Leave $leave)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'employee_nip' => 'required',
            'leave_date' => 'required|date',
            'duration' => 'required|integer',
            'description' => 'required',
        ]);

        // Mengupdate data cuti
        $leave->update([
            'employee_nip' => $request->input('employee_nip'),
            'leave_date' => $request->input('leave_date'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
        ]);

        // Redirect ke halaman yang sesuai atau lakukan tindakan lain yang diinginkan
        return redirect()->route('leaves.index')->with('success', 'Leave has been updated successfully!');
    }
    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Leave record deleted successfully');
    }
}
