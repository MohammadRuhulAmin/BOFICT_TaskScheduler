<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Admin\Assigntask;
use App\Models\Admin\Task;
use App\Models\Admin\Employee;
use DateTime;

class DashboardController extends Controller
{
    public function todayEmployeeTask(){
        //return  $dt->format('Y-m-d H:i:s');
        $date  = new DateTime();
        $todayDate =  $date->format('Y-m-d');
        $taskList = Assigntask::where(['date' =>$todayDate])->orderBy('created_at','DESC')->get();
        
        $combineAllInformation = [];
        for($i = 0;$i<count($taskList);$i++){
            $employeeName = $taskList[$i]->employeeName;
            $taskName = $taskList[$i]->task;
            $employeeDetails = Employee::where(['name'=>$employeeName])->first();
            $taskDetails     = Task::where(['taskName' =>$taskName])->first();
            $combineAllInformation[$i] = [
                'taskList' =>$taskList[$i],
                'employeeDetails' =>$employeeDetails,
                'taskDetails' => $taskDetails,
            ];
        }
        //return count($combineAllInformation);
        //return $combineAllInformation[0]['taskList']['employeeName'];
       
        
        return view('admin.Dashboard.todayEmployeeTask')->with(['combineAllInformation'=>$combineAllInformation]);
    }
}


