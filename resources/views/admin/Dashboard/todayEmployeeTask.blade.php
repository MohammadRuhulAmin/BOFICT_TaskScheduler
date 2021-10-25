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
            <li class="breadcrumb-item active"> Today Task  Dashboard  </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <h2 style="color: red;"> <marquee behavior="" direction=""> Bangladesh Ordnance Factories (ICT CELL) // </marquee></h2>
  <div class="card m-3">
    <div class="card-header">
        <h3 align="center"> {{ date('Y-m-d   H:i:s') }}  Work Flow   </h3>
    </div>
    <div class="card-body">
        @for ($i = 0;$i<count($combineAllInformation);$i++)
         <div class="card">
            <div class="card-header">
                <p> SL {{$i+1 }} </p>
            </div>
            <div class="card-body">
               <div class="card">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-primary">
                                <div class="card-header"><p class="card-title"> {{$combineAllInformation[$i]['employeeDetails']['name']}} </p></div>
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-sm-6">
                                        <img width="128px" src="{{url('storage/'.$combineAllInformation[$i]['employeeDetails']['image'])}}"/> 
                                       </div>
                                       <div class="col-sm-6" >
                                           <table class="table table-striped table-sm">
                                                <tr>
                                                    <td>Task : </td> <td>{{$combineAllInformation[$i]['taskList']['task']}} </td>
                                                </tr>
                                                <tr>
                                                    <td> Details :  </td><td>{{$combineAllInformation[$i]['taskDetails']['taskDetails']}}</td>
                                                </tr>
                                                <tr>
                                                    <td> Date  </td><td> {{$combineAllInformation[$i]['taskList']['date']}} </td>
                                                </tr>
                                                <tr>
                                                    <td>Start Time  </td> <td>{{$combineAllInformation[$i]['taskList']['startTime']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>End Time  </td> <td>{{$combineAllInformation[$i]['taskList']['endTime']}}</td>
                                                </tr>
                                           </table>
                                       </div>
                                   </div>
                                </div>
                                <div class="card-footer">
                                    <p>Designation :  {{$combineAllInformation[$i]['employeeDetails']['designation']}} / ID No : {{$combineAllInformation[$i]['employeeDetails']['bofid']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
         </div>            
        @endfor
    </div>
    <div class="footer">
        <h5 align="center"> BOF ICT CELL    </h5>
    </div>
  </div>
  <!-- /.content -->
@endsection 
