<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Models\Admin\Assigntask;
use RealRashid\SweetAlert\Facades\Alert;

class SearchEmployeeTaskController extends Controller
{
    public function searchindex(){
        $employees = Employee::all();
        return view('admin.searchs.searchIndex',compact('employees'));
    }
    public function employeeSearchTaskResult(Request $request){
        $employeeName = $request->employeeName;
        $fromDate  = $request->fromDate;
        $toDate   = $request->toDate;

        if($employeeName === null && $fromDate === null && $toDate === null){
            $this->validate($request,[
                'employeeName' =>'required',
            ]);
        }

        if($fromDate !==null && $toDate === null){
            $this->validate($request,[
                'toDate'=>'required'
            ]);
        }
        if($toDate !== null && $fromDate === null){
            $this->validate($request,[
                'fromDate' =>'required'
            ]);
        }
        
        if($employeeName !== null && $fromDate === null && $toDate === null){
            $query = Assigntask::where(['employeeName'=>$employeeName])->orderBy('Created_at','DESC')->get();
            return response()->json($query);
        }
        if($fromDate !==null && $toDate !== null && $employeeName === null  ){
            $query = Assigntask::where('date', '>=', $fromDate)
            ->where('date', '<=', $toDate)
            ->get();
            return response()->json($query);
        }
        if($employeeName !== null && $fromDate !== null && $toDate !== null){
            $query = Assigntask::where('date', '>=', $fromDate)
            ->where('date', '<=', $toDate)
            ->where(['employeeName' => $employeeName])
            ->get();
            return response()->json($query);
        }
        

        
        
        


        
    }
}
