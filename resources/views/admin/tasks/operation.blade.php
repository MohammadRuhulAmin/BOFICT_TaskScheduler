@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Task Control  </h1>
          <br>
         
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home  </a></li>
            <li class="breadcrumb-item active"> Task control </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div style="padding: 30px">
    <div class="container">
        <h2 style="color: red;"> <marquee behavior="" direction=""> Bangladesh Ordnance Factories </marquee></h2>
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-primary">
                    <div class="card-header">
                      <p>Select Employee</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group"> 
                            <label> Select   Employee  <span class="text-danger"> *</span> </label>
                            <select class="form-control"  id="selectEmployee"  >
                                <option></option>
                                @foreach ($employees as $employee )
                                    <option>{{$employee->name}}</option>
                                @endforeach
                            </select>
                           
                            <span class="text-danger" id="employeeNameError">  </span>
                        </div>
                        <div class="form-control">
                          <label> Select Task </label> 
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" >
                
                <div class="card card-primary">
                   <div class="card-header"> <p>  Assign Task    </p> </div>
                    <div class="card-body">
                       <div id="employeeDetails"> </div>
                        
                        
                        
                        
                     
                    </div>
                </div>
              
            </div>
        </div>
    </div>
 </div>
  <!-- /.content -->
    
  
@endsection
