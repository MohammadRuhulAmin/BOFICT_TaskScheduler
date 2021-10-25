@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Notice  </h1>
          <br>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> Home  </a></li>
            <li class="breadcrumb-item active"> Notice  List </li>
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
                        All Notice List 
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col"> SL </th>
                                    <th scope="col"> Notice Title</th>
                                    <th scope="col"> Notice Description  </th>
                                    <th scope="col"> Status  </th>
                                    <th scope="col">Action</th> 
                                </tr>
                            </thead>
                            <tbody id="noticeTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" >
              {{-- <form  enctype="multipart/form-data"> --}}
                <div class="card card-primary">
                    <div class="card-header">
                        <span id="labelNoticeAdd">Add New Notice </span>
                        <span id="labelNoticeUpdate"> Update Notice </span> 
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Notice Title  <span class="text-danger"> * </span> </label>
                            <input type="text"  class="form-control"  id="noticeTitle" />
                            <span class="text-danger" id="noticeTitleError"></span>
                        </div>
                        <div class="form-group">
                            <label>Notice Details  <span class="text-danger"> *</span> </label>
                            <input type="text" class="form-control"id="noticeDescription"/>
                            <span class="text-danger" id="noticeDescriptionError">  </span>
                        </div>
                        <div class="form-group">
                            <table class="table table-striped">
                                <tr>
                                    <td><label class="form-control">Notice Status </label></td>
                                    <td>
                                        <input type="checkbox" class="form-control" id="isActive" />
                                        <span class="text-danger" id="noticeStatusError"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                         <input type="hidden"  id="id">
                        <div>
                            <button type="submit" class="btn btn-primary" onclick="addNewNotice()" id="addNoticeButton"> Add Notice </button>
                            <button type="submit" class="btn btn-success" onclick="updateNoticeInformation()" id="updateNoticeButton" > Update Notice </button>
                        </div>
                    </div>
                </div>
              {{-- </form> --}}
            </div>
        </div>
  <!-- /.content -->
    
  
@endsection 
