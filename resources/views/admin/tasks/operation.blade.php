@extends('layouts.master')

@section('content')
@include('layouts.jquery._addNewDynamicTask')
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
         
            <div class="col-sm-12">
              <form action="{{route('tasks.store')}}" method="POST">
                @csrf
              <div class="card card-primary">
                  <div class="card-header">
                    <p>Task Schedule</p>
                  </div>
                  <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                  </div>
                
                  <div class="card-body">
                  <div class="form-group">
                          <div class="row">
                              <div class="col-sm-8">
                                <label> Select   Employee  <span class="text-danger">*</span> </label>
                                <select class="form-control"  id="selectEmployee" name="employeeName">
                                    <option></option>
                                    @foreach ($employees as $employee )
                                        <option>{{$employee->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('employeeName'))
                                    <span class="text-danger">{{$errors->first('employeeName')}} </span>
                                @endif
                                <span class="text-danger" id="employeeNameError">  </span>
                              </div>
                              <div class="col-sm-4">
                                <button class="btn  btn-success float-right"   id="addDynamicTaskInput" > <i class="fas fa-plus"></i> Add Task  Schedule  </button>
                              </div>
                          </div>
                        </div>
                     <div class="form-group" id="dynamic_fieldInput"></div>
                     <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>  Save  </button>
                    
                  </div>
                  {{-- end --}}
              </div>
            </form>
          </div>
        </div>
    </div>
 </div>

 <div>

</div>
  <!-- /.content -->
    
  
@endsection
