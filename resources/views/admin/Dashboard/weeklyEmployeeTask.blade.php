@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Dashboard   </h1>
          <br>
         
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home  </a></li>
            <li class="breadcrumb-item active"> weekly Task  Dashboard  </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  
  <div class="card">
    <div class="card-header"><h1  class="display-3 card-title"> Shift - 1<sup>st </sup> </h1></div>
       <table class="table table-sm table-striped m-3">
           <thead>
                <th> Day   </th>
                <th> Date  </th>
                <th> Image </th>
                <th> Employee Name  </th>
                <th> Employee Designation </th>
                <th> Location </th>
                <th> Task </th>
                <th> In </th>
                <th> Out </th>
                <th> Total Time </th>
           </thead>
           <tbody>
              @for ($i = 0;$i<count($combineAllWeeklyInformation_shift_1);$i++)
              <tr>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['dayName']}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['date']}}</td>
                <td><img width="64px" src="{{url('storage/'.$combineAllWeeklyInformation_shift_1[$i]['employeeImage']->image)}}"/></td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['employeeName']}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['employeeDesignation']->designation}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['location']}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['employeeTask']}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['startTime']}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['endTime']}}</td>
                <td>{{$combineAllWeeklyInformation_shift_1[$i]['totalTime']}}</td>
            </tr>
              @endfor
                   
               
           </tbody>
       </table>
        
  </div>
  <br><br>
  <div class="card">
      <div class="card-header"><h1  class="card-title text-center"> Shift - 2<sup>nd</sup> </h1></div>
    <table class="table table-sm table-striped m-3">
        <thead>
             <th> Day </th>
             <th> Date </th>
             <th> Image </th>
             <th> Employee Name  </th>
             <th> Employee Designation </th>
             <th> Location  </th>
             <th> Task </th>
             <th> In </th>
             <th> Out </th>
             <th> Total Time </th>
        </thead>
        <tbody>
           @for ($i = 0;$i<count($combineAllWeeklyInformation_shift_2);$i++)
           <tr>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['dayName']}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['date']}}</td>
             <td><img width="64px" src="{{url('storage/'.$combineAllWeeklyInformation_shift_2[$i]['employeeImage']->image)}}"/></td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['employeeName']}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['employeeDesignation']->designation}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['location']}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['employeeTask']}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['startTime']}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['endTime']}}</td>
             <td>{{$combineAllWeeklyInformation_shift_2[$i]['totalTime']}}</td>
         </tr>
           @endfor
                
            
        </tbody>
    </table>
     
</div>
 

  <!-- /.content -->
@endsection 
