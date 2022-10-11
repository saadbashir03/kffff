<?php

use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;
// import auTH Facade
use Illuminate\Support\Facades\Auth;

// import HomeController
use App\Http\Controllers\HomeController;

use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\LeaveController;

Route::get('/', function () {
    return view('front.home');
})->name('front');

Route::get('/about', function () {
    return view('front.About');
})->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// route for admin
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');
});





Route::get('/leave',[LeaveController::class,'index'])->name('leave');

Route::post('/leavesave', [LeaveController::class, 'LeaveSave'])->name('leavesave');


Route::get('fullcalender', [FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);


// Route::get('/claim', function () {
//     return view('backend.claim');
// })->name('claim');

// Route::get('/claim', function () {
//     return view('backend.test');
// })->name('claim');


// delete leave
Route::get('/leavedelete/{id}',[LeaveController::class,'deleteleave'])->name('leavedelete');

// approve leave
Route::get('/leaveapprove/{id}',[LeaveController::class,'approveleave'])->name('AcceptLeaveStatus');
// reject leave
Route::get('/leavereject/{id}',[LeaveController::class,'rejectleave'])->name('RejectLeaveStatus');

// save claim
Route::post('/claimsave', [ClaimController::class, 'ClaimSave'])->name('claimsave');

// claim
Route::get('/claim', [ClaimController::class, 'index'])->name('claim');

// delete claim
Route::get('/claimdelete/{id}',[ClaimController::class,'deleteclaim'])->name('claimdelete');

// approve claim
Route::get('/claimapprove/{id}',[ClaimController::class,'approveclaim'])->name('AcceptClaimStatus');

// reject claim
Route::get('/claimreject/{id}',[ClaimController::class,'rejectclaim'])->name('RejectClaimStatus');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/manager', function () {

         $leaves=App\Models\Leave::all();
         $claims=App\Models\Claim::all();
        return view('backend.manager',compact('leaves','claims'));
    })->name('admin.manager');
});




// payroll
Route::get('/payroll', function () {
    return view('backend.payroll.index');
})->name('payroll');
