<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Admin\Assigntask;
use App\Models\Admin\Task;
use App\Models\Admin\Employee;
use DateTime;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //Vehicle::find(3)->value('register_number');

    public function weekEmployeeTask(){
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek(Carbon::SATURDAY)->format('Y-m-d'); //H:i
        $weekEndDate = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
        //  $day = Carbon::createFromFormat('Y-m-d', $weekEndDate)->format('l');
        //  return $day;
        $combineAllWeeklyInformation = [];
        $weeklyTaskList =  Assigntask::whereBetween('date', [$weekStartDate,$weekEndDate])->get();
        for($i = 0;$i<count($weeklyTaskList);$i++){
            $combineAllWeeklyInformation[$i] =[
                'dayName' => Carbon::createFromFormat('Y-m-d', $weeklyTaskList[$i]->date)->format('l'),
                'date'=> $weeklyTaskList[$i]->date,
                'employeeName' =>$weeklyTaskList[$i]->employeeName,
                'employeeImage' =>DB::table('employees')->where(['name'=>$weeklyTaskList[$i]->employeeName])->first('image'),
                'employeeDesignation' =>DB::table('employees')->where(['name'=>$weeklyTaskList[$i]->employeeName])->first('designation'),
                'employeeTask' =>$weeklyTaskList[$i]->task,
                'startTime' =>$weeklyTaskList[$i]->startTime,
                'endTime' =>$weeklyTaskList[$i]->endTime,

            ];
        }
        //return $combineAllWeeklyInformation;
        //  return $combineAllWeeklyInformation[0]['dayName'];
        return view('admin.Dashboard.weeklyEmployeeTask',compact('combineAllWeeklyInformation'));
    }


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


