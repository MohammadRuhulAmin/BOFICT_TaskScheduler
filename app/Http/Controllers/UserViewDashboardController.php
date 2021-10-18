<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Admin\Assigntask;
use App\Models\Admin\Task;
use App\Models\Admin\Employee;
use DateTime;
use DB;
use Carbon\Carbon;

class UserViewDashboardController extends Controller
{
    //Vehicle::find(3)->value('register_number');

    public function weekEmployeeTask(){
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek(Carbon::SATURDAY)->format('Y-m-d'); //H:i
        $weekEndDate = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
        //  $day = Carbon::createFromFormat('Y-m-d', $weekEndDate)->format('l');
        //  return $day;

        //first Shift Start 
        $combineAllWeeklyInformation_shift_1 = [];
        $weeklyTaskList_shift_1 =  Assigntask::whereBetween('date', [$weekStartDate,$weekEndDate])->where(['shift'=>'OT-1'])->orderBy('date')->get();
        for($i = 0;$i<count($weeklyTaskList_shift_1);$i++){
            $combineAllWeeklyInformation_shift_1[$i] =[
                'dayName' => Carbon::createFromFormat('Y-m-d', $weeklyTaskList_shift_1[$i]->date)->format('l'),
                'date'=> $weeklyTaskList_shift_1[$i]->date,                    
                'employeeName' =>$weeklyTaskList_shift_1[$i]->employeeName,
                'employeeImage' =>DB::table('employees')->where(['name'=>$weeklyTaskList_shift_1[$i]->employeeName])->first('image'),
                'employeeDesignation' =>DB::table('employees')->where(['name'=>$weeklyTaskList_shift_1[$i]->employeeName])->first('designation'),
                'employeeTask' =>$weeklyTaskList_shift_1[$i]->task,
                'startTime' =>$weeklyTaskList_shift_1[$i]->startTime,
                'endTime' =>$weeklyTaskList_shift_1[$i]->endTime,
                'totalTime'=>$weeklyTaskList_shift_1[$i]->totalTime,
                'location'=>$weeklyTaskList_shift_1[$i]->location,
            ];
        }
        //first Shift end 
        //Second Shift Start 
        $combineAllWeeklyInformation_shift_2 = [];
        $weeklyTaskList_shift_2 =  Assigntask::whereBetween('date', [$weekStartDate,$weekEndDate])->where(['shift'=>'OT-2'])->orderBy('date')->get();
        for($i = 0;$i<count($weeklyTaskList_shift_2);$i++){
            $combineAllWeeklyInformation_shift_2[$i] =[
                'dayName' => Carbon::createFromFormat('Y-m-d', $weeklyTaskList_shift_2[$i]->date)->format('l'),
                'date'=> $weeklyTaskList_shift_2[$i]->date,                    
                'employeeName' =>$weeklyTaskList_shift_2[$i]->employeeName,
                'employeeImage' =>DB::table('employees')->where(['name'=>$weeklyTaskList_shift_2[$i]->employeeName])->first('image'),
                'employeeDesignation' =>DB::table('employees')->where(['name'=>$weeklyTaskList_shift_2[$i]->employeeName])->first('designation'),
                'employeeTask' =>$weeklyTaskList_shift_2[$i]->task,
                'startTime' =>$weeklyTaskList_shift_2[$i]->startTime,
                'endTime' =>$weeklyTaskList_shift_2[$i]->endTime,
                'totalTime'=>$weeklyTaskList_shift_2[$i]->totalTime,
                'location'=>$weeklyTaskList_shift_2[$i]->location,
            ];
        }
        //Second Shift end 
        return view('Dashboard.WeeklyDashboard',compact('combineAllWeeklyInformation_shift_1','combineAllWeeklyInformation_shift_2'));
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
       
        return view('admin.Dashboard.todayEmployeeTask')->with(['combineAllInformation'=>$combineAllInformation]);
    }
}


