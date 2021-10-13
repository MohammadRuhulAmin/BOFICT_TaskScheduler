@extends('layouts.master')

@section('content')
@include('layouts.jquery._searchTaskInformation')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Search Task </h1>
          <br>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home  </a></li>
            <li class="breadcrumb-item active">Search Task   </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card card-primary m-3">
      <div class="card-header"> <p> Search Employee Task  </p></div>
      <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Select Employee  </label>
                    <select class="form-control selectEmployee" id="employeeName" >
                        <option></option>
                        @foreach ($employees as  $employee)
                            <option>{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-success" id="employeeNameError"></span>
            </div>
            <div class="col-sm-4">
                <label> From Date </label>
                <input type="date" id="fromDate" class="form-control">
                <span class="text-danger" id="fromDateError"></span>
            </div>
            <div class="col-sm-4">
                <label> To Date </label>
                <input type="date" id="toDate"   class="form-control">
                <span class="text-danger" id="toDateError"></span>
            </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary" onclick="searchEmployeeTaskInformation()"> <i class="fas fa-search"></i> Search </button>
      </div>
  </div>

  <div class="card card-primary m-3">
    <div class="card-header"> <p> Employee Task Result  </p></div>
    <div class="card-body">
      <table class="table table-sm table-bordered table-striped">
        <thead>
            <th>#</th>  
            <th>Name</th>
            <th> Task </th>
            <th> Date </th>
            <th> Time </th>
            
            {{-- <th> Action </th> --}}
        </thead>
        <tbody id="taskListInformation">
        </tbody>

      </table>
    </div>
   
</div>


  



  <!-- Main content -->
@endsection 
