<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Admin\Assigntask;
use App\Models\Admin\Task;
use App\Models\Admin\Employee;
use DateTime;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
    public function todayTomorrowYesterdayTask(){
       //Today data
        $todayDate = Carbon::now()->format('Y-m-d');
        $todayTaskList = Assigntask::where(['date' =>$todayDate])->orderBy('created_at','DESC')->get();
        $combineAllInformation_today = [];
        for($i = 0;$i<count($todayTaskList);$i++){
            $employeeName = $todayTaskList[$i]->employeeName;
            $taskName = $todayTaskList[$i]->task;
            $employeeDetails = Employee::where(['name'=>$employeeName])->first();
            $taskDetails     = Task::where(['taskName' =>$taskName])->first();
            $combineAllInformation_today[$i] = [
                'dayName' => Carbon::createFromFormat('Y-m-d', $todayTaskList[$i]->date)->format('l'),
                'taskList' =>$todayTaskList[$i],
                'employeeDetails' =>$employeeDetails,
                'taskDetails' => $taskDetails,
            ];
        }
       //end 
       // tomorrow data
       $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
       $tomorrowTaskList = Assigntask::where(['date' =>$tomorrowDate])->orderBy('created_at','DESC')->get();
       $combineAllInformation_tomorrow = [];
       for($i = 0;$i<count($tomorrowTaskList);$i++){
           $employeeName = $tomorrowTaskList[$i]->employeeName;
           $taskName = $tomorrowTaskList[$i]->task;
           $employeeDetails = Employee::where(['name'=>$employeeName])->first();
           $taskDetails     = Task::where(['taskName' =>$taskName])->first();
           $combineAllInformation_tomorrow[$i] = [
               'dayName' => Carbon::createFromFormat('Y-m-d', $tomorrowTaskList[$i]->date)->format('l'),
               'taskList' =>$tomorrowTaskList[$i],
               'employeeDetails' =>$employeeDetails,
               'taskDetails' => $taskDetails,
           ];
       }
       //end
       // yesterday data
       $yesterdayDate = Carbon::yesterday()->format('Y-m-d');
       $yesterdayTaskList = Assigntask::where(['date' =>$yesterdayDate])->orderBy('created_at','DESC')->get();
       $combineAllInformation_yesterday = [];
       for($i = 0;$i<count($yesterdayTaskList);$i++){
           $employeeName = $yesterdayTaskList[$i]->employeeName;
           $taskName = $yesterdayTaskList[$i]->task;
           $employeeDetails = Employee::where(['name'=>$employeeName])->first();
           $taskDetails     = Task::where(['taskName' =>$taskName])->first();
           $combineAllInformation_yesterday[$i] = [
            'dayName' => Carbon::createFromFormat('Y-m-d', $yesterdayTaskList[$i]->date)->format('l'),
               'taskList' =>$yesterdayTaskList[$i],
               'employeeDetails' =>$employeeDetails,
               'taskDetails' => $taskDetails,
           ];
       }
       //end
    //    return $combineAllInformation_today;
       return view('Dashboard.yesterdayTodayTomorrowDashboard',compact('combineAllInformation_today','combineAllInformation_yesterday','combineAllInformation_tomorrow'));
    }
}

