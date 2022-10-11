<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{

    public function index()
    {
        $leaves=Leave::all();

        //find all users by using user id from leave table
        return view('backend.leave',compact('leaves'));

        // return view('backend.leave');
    }

    //createa function for leave save
    public function LeaveSave(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'leave_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
        ]);

        $leave = new Leave;
        $leave->user_id = Auth::user()->id;
        $leave->leave_type = $request->leave_type;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->reason = $request->reason;
        $leave->leave_length= $request->leave_length;
        $leave->status = '0';
        $leave->save();

        $leaves=Leave::all();

        //find all users by using user id from leave table
        return view('backend.leave',compact('leaves'));

        // return redirect()->back()->with('success', 'Leave Request Send Successfully');
    }


    //delete leave
    public function deleteleave($id)
    {
        $leave=Leave::find($id);
        $leave->delete();
        return redirect()->back()->with('success', 'Leave Request Deleted Successfully');
    }

    //approve leave
    public function approveleave($id)
    {
        $leave=Leave::find($id);
        $leave->status='1';
        $leave->save();
        return redirect()->back()->with('success', 'Leave Request Approved Successfully');
    }

    //reject leave
    public function rejectleave($id)
    {
        $leave=Leave::find($id);
        $leave->status='2';
        $leave->save();
        return redirect()->back()->with('success', 'Leave Request Rejected Successfully');
    }


}
