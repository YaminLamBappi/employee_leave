<?php

namespace App\Http\Controllers;
use App\Models\LeaveApplication;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //

    public function leave_history()
    {
        $leaveApplications = Auth::user()->leaveApplications;
        return view('employee_leave_history', compact('leaveApplications'));
    }




    public function employee_panel()
    {
        $userRole = Auth::user()->role;

        $sickLeave = Auth::user()->sick_leave;
        $casualLeave = Auth::user()->casual_leave;
        $totalLeave = Auth::user()->total_leave;


        if ($userRole !== 'employee') {
            return redirect()->route('dashboard');
        }

        return view('employee', compact('sickLeave', 'casualLeave', 'totalLeave'));
    }

    public function leave_apply_create(): View
    {
        return view('apply_leave');
    }

    //
    public function apply_leave_store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|string',
            'leave_from' => 'required|date',
            'leave_to' => 'required|date|after_or_equal:leave_from',
            'reason' => 'required|string',
        ]);

        LeaveApplication::create([
            'user_id' => Auth::id(),
            'leave_type' => $request->leave_type,
            'leave_from' => $request->leave_from,
            'leave_to' => $request->leave_to,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);


        return redirect()->route('employee')->with('success', 'Leave application submitted successfully.');

    }
}

