<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Models\Admin\Assigntask;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin\Task;
use DateTime;
class SearchEmployeeTaskController extends Controller
{
    public function searchindex(){
        $employees = Employee::orderby('created_at','DESC')->get();
        $tasksList = Task::orderby('created_at','DESC')->get();
        return view('admin.searchs.searchIndex',compact('employees','tasksList'));
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
    public function deleteTask($id){
        $query = Assigntask::findOrFail($id);
        $query->delete();
        return response()->json($id);
    }

    public function updateTaskInformation(Request $request,$id){
        $TaskDetails = Assigntask::findOrFail($id);
        $TaskDetails->employeeName = $request->employeeName;
        $TaskDetails->task = $request->task;
        $TaskDetails->date = $request->date;
        $TaskDetails->location = $request->location;
        $TaskDetails->shift = $request->shift;
        $TaskDetails->startTime = $request->startTime;
        $TaskDetails->endTime = $request->endTime;
        
        // time calculation 
        $tempStartTime = new DateTime($request->startTime);
        $tempEndTime   = new DateTime($request->endTime);
        $timeInterval  = $tempStartTime->diff($tempEndTime);
        $finalTimeInterval = $timeInterval->format('%h').':'.$timeInterval->format('%i').':'.$timeInterval->format('%s');
        $TaskDetails->totalTime = $finalTimeInterval;
        $TaskDetails->save();
        //end time calculation 

        return response()->json($TaskDetails);
    }

}
