<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::orderby('id','DESC')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
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
            'employeeDesignation' =>'required',
            'employeeId' =>'required'
        ]);    
        $employee = new Employee();
        $employee->name = $request->employeeName;
        $employee->designation = $request->employeeDesignation;
        $employee->bofid = $request->employeeId;
        if($request->hasFile('employeeImage')){
            $image = $request->file('employeeImage');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $request->employeeImage->move('storage/',$fileName); 
            $employee->image = $fileName;
        }
        $employee->save();
        return response()->json($employee);
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
        $data = Employee::findOrFail($id);
        return response()->json($data);
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
        
        $this->validate($request,[
            'employeeName' =>'required',
            'employeeDesignation' =>'required',
            'employeeId' =>'required'
        ]);
        $employee = Employee::findOrFail($id);
        $employee->name = $request->employeeName;
        $employee->designation = $request->employeeDesignation;
        $employee->bofid = $request->employeeId;
        if($request->hasFile('employeeImage')){
            $image = $request->file('employeeImage');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $request->employeeImage->move('storage/',$fileName);
            $employee->image = $fileName;
        }
        $employee->save();
        return response() ->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
        return response()->json($data);
    }
}
