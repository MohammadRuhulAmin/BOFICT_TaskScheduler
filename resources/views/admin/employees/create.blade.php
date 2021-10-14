@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Employee  </h1>
          <br>
         
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home  </a></li>
            <li class="breadcrumb-item active"> Employee List </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

  <!-- /.content-header -->
  <!-- Main content -->
 
  
   
        
        <div class="row m-3 row-sm">
            <div class="col-sm-8">
                <div class="card card-primary">
                    <div class="card-header">
                        All Employee List 
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Image</th>
                                    <th scope="col">BOF ID </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="employeeTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" >
              {{-- <form  enctype="multipart/form-data"> --}}
                <div class="card card-primary">
                    <div class="card-header">
                        <span id="labelEmployeeAdd">Add New Employee </span>
                        <span id="labelEmployeeUpdate"> Update Employee Information  </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Employee Name <span class="text-danger"> *</span> </label>
                            <input type="text"  class="form-control"  id="employeeName" />
                            <span class="text-danger" id="employeeNameError"> </span>
                        </div>
                        <div class="form-group">
                            <label>Employee Designation <span class="text-danger"> *</span> </label>
                            <input type="text" class="form-control"id="employeeDesignation" />
                            <span class="text-danger" id="employeeDesignationError" ></span>
                        </div>
                        <div class="form-group">
                            <label>Employee BOF ID  <span class="text-danger"> *</span> </label>
                            <input type="text" class="form-control" id="employeeId" />
                            <span class="text-danger" id="employeeIdError"></span>
                        </div>
                        <div class="form-group">
                            <label> Image  </label>
                            <input type="file" class="form-control" name="employeeImage" id="employeeImage"/>
                           
                        </div>
                         <input type="hidden"  id="id">
                        <div>
                            <button type="submit" class="btn btn-primary" onclick="addNewEmployee()" id="addEmployeeButton"> Add Employee </button>
                            <button type="submit" class="btn btn-success" onclick="updateEmployeeInformation()" id="updateEmployeeButton" > Update Employee </button>
                        </div>
                    </div>
                </div>
              {{-- </form> --}}
            </div>
        </div>
    

    
  <!-- /.content -->
    
  
@endsection 
