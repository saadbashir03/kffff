<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;

class ClaimController extends Controller
{


    public function index()
    {
        $claims = Claim::all();

        return view('backend.test', compact('claims'));
    }

    // claim save
    public function ClaimSave(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required',
        //     'claim_type' => 'required',
        //     'date' => 'required',
        //     'total_claim' => 'required',
        //     'receipt' => 'required',
        //     'status' => 'required',
        //     'note' => 'required',
        //     'sst_amount' => 'required',
        //     'sst_percentage' => 'required',
        //     'total_mileage' => 'required',
        // ]);

        $claim = new Claim;
        $claim->user_id = $request->user_id;
        $claim->claim_type = $request->claim_type;
        $claim->date = $request->date;
        $claim->total_claim = $request->total_claim;
        $claim->receipt = $request->receipt;
        $claim->status = '0';
        $claim->note = $request->note;
        $claim->sst_amount = $request->sst_amount;
        $claim->sst_percentage = $request->sst_percentage;
        $claim->total_mileage = $request->total_mileage;
        $claim->save();

        return redirect()->back()->with('success', 'Claim Saved Successfully');
    }


    // claim delete
    public function deleteclaim($id)
    {
        $claim = Claim::find($id);
        $claim->delete();

        return redirect()->back()->with('success', 'Claim Deleted Successfully');
    }

    // approve claim
    public function approveclaim($id)
    {
        $claim = Claim::find($id);
        $claim->status = "1";
        $claim->save();

        return redirect()->back()->with('success', 'Claim Approved Successfully');
    }

    // reject claim
    public function rejectclaim($id)
    {
        $claim = Claim::find($id);
        $claim->status = "2";
        $claim->save();

        return redirect()->back()->with('success', 'Claim Rejected Successfully');
    }

}

