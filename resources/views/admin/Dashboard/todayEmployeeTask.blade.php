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
            <li class="breadcrumb-item active"> Dashboard  </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
 
  <!-- Main content -->
  <div class="card m-3">
    <div class="card-header">
        <h3 align="center"> {{ date('Y-m-d   H:i:s') }}  Work Flow   </h3>
    </div>
    <div class="card-body">
        @for ($i = 0;$i<count($combineAllInformation);$i++)
           <div class="card">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$combineAllInformation[$i]['employeeDetails']['name']}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img width="128px" src="{{url('storage/'.$combineAllInformation[$i]['employeeDetails']['image'])}}"/>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-footer">
                            <p>{{$combineAllInformation[$i]['employeeDetails']['designation']}}</p>
                            <p>{{$combineAllInformation[$i]['employeeDetails']['bofid']}}</p>
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$combineAllInformation[$i]['taskList']['task']}}</h3>
                        </div>
                        <div class="card-body">
                            <h5>
                                {{$combineAllInformation[$i]['taskDetails']['taskDetails']}}
                            </h5>
                            <h3>{{$combineAllInformation[$i]['taskList']['date']}}</h3>
                            
                        </div>
                        <div class="card-footer">
                            <h5>{{$combineAllInformation[$i]['taskList']['time']}}</h5>
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
