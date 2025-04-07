<?php

namespace App\Http\Controllers;

use App\Models\leave;
use App\Models\leave_grant;
use App\Models\leave_request;
use App\Notifications\LeaveStatusUpdateNotification;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');  
}

    public function index()
    {
        $leaves = leave_grant::with('user')->get();
        return view('leaves.list', compact('leaves'));

    }

  
    public function create()
    {
        return view('leaves.create');

       
    }
   
public function store(Request $request)
{
    $request->validate([
        'leave_type' => ['required', 'string'],
        'start_date' => ['required', 'date'],
        'end_date' => ['required', 'date'],
        'reason' => ['required', 'string'],
    ]);


    $leave = leave_grant::create([
        'days_requested' => $request->days_requested,
        'leave_type' => $request->leave_type,
        'user_id' => Auth::id(), 
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'reason' => $request->reason,
        'status' => 'pending',
    ]);



    return redirect()->route('leaves.index')->with('success', 'Leave request created successfully!');
}
    public function edit(string $id)
    {
        $leaves = leave_grant::findOrFail($id);
       
        return view('leaves.aproveLeave', [
            'leaves' => $leaves,
            
        ]);
    }

   
    public function update(Request $request, $id)
    {
     
        $leave = leave_grant::findOrFail($id);
    
      
        $request->validate([
            'status' => ['required', 'string'], 
        ]);
    
     
        $leave->status = $request->status;
    
     
        $leave->save();
    
     
        $leave->user->notify(new LeaveStatusUpdateNotification($leave));
    
        return redirect()->route('leaves.index')->with('success', 'Leave request updated and notification sent successfully!');
    }

    public function destroy(string $id)
    {
        $size = leave_grant::find($id);
    
        $size->delete();
    
        
        return redirect()->route('leaves.index')->with('success', 'User deleted successfully.');
    }
    

}
