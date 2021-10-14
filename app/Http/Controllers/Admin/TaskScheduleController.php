<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Models\Admin\Task;
use App\Models\Admin\Assigntask;
use RealRashid\SweetAlert\Facades\Alert;
class TaskScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $tasks     = Task::all();
        return view('admin.tasks.operation',compact('employees','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'employeeName' =>'required',
            'taskList' =>'required',
            // 'timeList' => 'required',
        ]);

        $employeeName = $request->employeeName;
        $taskList     = $request->taskList;
        $dateList     = $request->dateList;
        $startTimeList     = $request->startTimeList;
        $endTimeList   = $request->endTimeList;

        
        $workLength = count($taskList);
        for($i = 0;$i!=$workLength ;$i++){
            $assignTask = new Assigntask();
            $assignTask->employeeName = $employeeName;
            $assignTask->task  = $taskList[$i];
            $assignTask->startTime = $startTimeList[$i];
            $assignTask->endTime = $endTimeList[$i];
            $assignTask->date = $dateList[$i];
            $assignTask->save();
        }
        Alert::success('Employee', 'Has Been Assigned To the Task Successfully! ');
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
