<?php

namespace App\Http\Controllers;

use App\Models\leave;
use App\Models\leave_grant;
use App\Models\leave_request;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = leave_grant::latest()->paginate(10);
        return view('leaves.list', compact('leaves'));

    }

  
    public function create()
    {
        return view('leaves.create');

       
    }
    public function store(Request $request)
    {
        $request->validate([
            'days_requested' => ['required', 'integer', 'min:1'],
            'leave_type' => ['required', 'string'],
            
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'reason' => ['required', 'string'],
        ]);

        $leave =leave_grant::create([
            'days_requested' => $request->days_requested,
            'leave_type' => $request->leave_type,
            'user_id' => 7,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);
        
        $leave->save();

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
            'days_requested' => ['required', 'integer', 'min:1'],
            'leave_type' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'reason' => ['required', 'string'],
        ]);
    
     
        $leave->days_requested = $request->days_requested;
        $leave->leave_type = $request->leave_type;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->reason = $request->reason;
        $leave->status = $request->status;
    
     
        $leave->save();
    
        return redirect()->route('leaves.index')->with('success', 'Leave request updated successfully!');
    }
    public function destroy(string $id)
    {
        $size = leave_grant::find($id);
    
        $size->delete();
    
        
        return redirect()->route('leaves.index')->with('success', 'User deleted successfully.');
    }
    

}
