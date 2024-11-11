<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{

    public function admin_leave_history()
    {
        $leaveApplications = LeaveApplication::with('user')->get();
        return view('admin_leave_history', compact('leaveApplications'));
    }

    public function approve($id)
    {
        $leaveApplication = LeaveApplication::findOrFail($id);


        $user = User::findOrFail($leaveApplication->user_id);

        $countDays = LeaveApplication::where('id', $leaveApplication->id)
            ->selectRaw('DATEDIFF(leave_to, leave_from) AS days')
            ->value('days');
        if ($leaveApplication->leave_type === 'casual') {
            // dd($user->casual_leave);
            $user->casual_leave = $user->casual_leave - $countDays;

        } elseif ($leaveApplication->leave_type === 'sick') {
            $user->sick_leave -= $countDays;
        }

        $user->save();

        // dd($user->casual_leave);
        $leaveApplication->status = 'approved';
        $leaveApplication->save();

        return redirect()->route('dashboard');
    }


    public function reject($id)
    {

        $leaveApplications = LeaveApplication::findOrFail($id);

        $leaveApplications->status = 'rejected';
        $leaveApplications->save();

        $leaveApplications = LeaveApplication::with('user')->where('status', 'pending')->get();
        return view('admin_manage_leave', compact('leaveApplications'));
    }




    public function manage_leave()
    {
        $leaveApplications = LeaveApplication::with('user')->where('status', 'pending')->get();
        return view('admin_manage_leave', compact('leaveApplications'));
    }


    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }

    public function dashboard()
    {
        $userRole = Auth::user()->role;

        // Directly handle the redirection based on the role
        switch ($userRole) {
            case 'admin':
                return redirect()->route('admin');
            case 'employee':
                return redirect()->route('employee');
            default:
                return redirect()->route('login');
        }
    }

    public function admin_panel()
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            $leaveApplications = LeaveApplication::where('status', 'pending')->count();
            $totalEmployee = \App\Models\User::count();


            if ($userRole !== 'admin') {
                return redirect()->route('dashboard');
            }

            return view('admin', compact('leaveApplications', 'totalEmployee'));
        }
        return redirect()->route('login');

    }

    public function employee_panel()
    {
        $userRole = Auth::user()->role;

        if ($userRole !== 'employee') {
            return redirect()->route('dashboard');
        }

        return view('employee');
    }


    public function create(): View
    {
        return view('add_employee');
    }

    //

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'sick_leave' => 'required|integer',
            'casual_leave' => 'required|integer',
            'password' => 'required|min:6|confirmed',  // Adding password confirmation validation
        ]);

        // Create the new user and store in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'sick_leave' => $request->sick_leave,
            'casual_leave' => $request->casual_leave,
            'total_leave' => $request->sick_leave + $request->casual_leave, // Calculate total leave
            'password' => Hash::make($request->password),  // Hash the password before storing
        ]);

        return redirect('dashboard')->with('success', 'Added Member');
    }

}
