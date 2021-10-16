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
       <table class="table table-striped m-3">
           <thead>
                <th> Day </th>
                <th> Date </th>
                <th> Image </th>
                <th> Employee Name  </th>
                <th> Employee Designation  </th>
                <th> Location  </th>
                <th> In </th>
                <th> Out </th>
           </thead>
          
           <tbody>
              @for ($i = 0;$i<count($combineAllWeeklyInformation);$i++)
              <tr>
                <td>{{$combineAllWeeklyInformation[$i]['dayName']}}</td>
                <td>{{$combineAllWeeklyInformation[$i]['date']}}</td>
                <td><img width="64px" src="{{url('storage/'.$combineAllWeeklyInformation[$i]['employeeImage']->image)}}"/> </td>
                <td>{{$combineAllWeeklyInformation[$i]['employeeName']}}</td>
                <td>{{$combineAllWeeklyInformation[$i]['employeeDesignation']->designation}}</td>
                <td>Location</td>
                <td>{{$combineAllWeeklyInformation[$i]['startTime']}}</td>
                <td>{{$combineAllWeeklyInformation[$i]['endTime']}}</td>
            </tr>
              @endfor
                   
               
           </tbody>
       </table>
        
  </div>
 

  <!-- /.content -->
@endsection 
