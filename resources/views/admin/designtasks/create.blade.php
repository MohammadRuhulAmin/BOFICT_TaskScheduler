@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Task   </h1>
          <br>
         
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home  </a></li>
            <li class="breadcrumb-item active">Task List   </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
 
  <!-- Main content -->
  <div style="padding: 30px">
    <div class="container">
        {{-- <h2 style="color: red;"> <marquee behavior="" direction=""> Bangladesh Ordnance Factories </marquee></h2> --}}
        <div class="row">
            <div class="col-sm-8">
                <div class="card card-primary">
                    <div class="card-header">
                        All Task  List 
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th scope="col">  #  </th>
                                    <th scope="col"> Task Name </th>
                                    <th scope="col">Task Details</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="tasksTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" >
              
                <div class="card card-primary">
                    <div class="card-header">
                        <span id="labelTaskAdd">Add New Task  </span>
                        <span id="labelTaskUpdate">Update Task </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Task Name <span class="text-danger"> *</span> </label>
                            <input type="text"  class="form-control"  id="taskName"/>
                            <span class="text-danger" id="taskNameError"> </span>
                        </div>
                        <div class="form-group">
                            <label> Task Details  </label>
                            <textarea class="form-control" id="taskDetails"></textarea>
                          
                        </div>

                         <input type="hidden"  id="id">
                        <div>
                            <button type="submit" class="btn btn-primary" onclick="addNewTask()" id="addTaskButton"> Add Task  </button>
                            <button type="submit" class="btn btn-success" onclick="updateTask()" id="updateTaskButton"> Update Task </button>
                        </div>
                    </div>
                </div>
              {{-- </form> --}}
            </div>
        </div>
    </div>
 </div>
  <!-- /.content -->
    
  
@endsection 
