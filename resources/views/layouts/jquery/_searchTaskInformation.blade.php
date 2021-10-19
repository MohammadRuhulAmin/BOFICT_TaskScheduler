
<script> 
    function clearError(){
            $('#fromDateError').text('')
            $('#toDateError').text('')
            $('#employeeNameError').text('')
            
    }
    clearError()
   function searchEmployeeTaskInformation(){
        clearAppendData()
        var employeeName = $('#employeeName').val()
        var fromDate  = $('#fromDate').val()
        var toDate    = $('#toDate').val()
        let _token   = $('meta[name="csrf-token"]').attr('content');
       
        $.ajax({
            type:"POST",
            dataType:"json",
            data:{
                _token :_token,
                employeeName:employeeName,
                fromDate:fromDate,
                toDate:toDate 
            },
            url:"{{route('search.sendRequest')}}",
            success:function(response){
                var taskList = "";
                clearError()
                $.each(response,function(key,value){
                    taskList  += `<tr id='row_${value.id}'>`
                    taskList  += "<td>" + value.id + "</td>"
                    // employeeList  += "<td>" +'<img src="{{asset('storage')}}/'+value.image+'"  width="64px">' + "</td>"
                    taskList  += "<td id='employeeName'>" + value.employeeName + "</td>"
                    taskList  += "<td id='task'>" + value.task + "</td>"
                    taskList  += "<td id='date'>" + value.date + "</td>"
                    taskList  += "<td id='shift'>" + value.shift + "</td>"
                    taskList  += "<td id='location'>" + value.location + "</td>"
                    taskList  += "<td id='startTime'>" + value.startTime + "</td>"
                    taskList  += "<td id='endTime'>" + value.endTime + "</td>"
                    taskList  += "<td id='totalTime'>" + value.totalTime + "</td>"
                   // taskList +="<td>"+ "<button  class='btn btn-sm btn-primary EditButton mr-2'> <i class='fas fa-edit'></i></button>"
                    taskList +="<td>" + "<button type='button' class='btn btn-sm btn-primary EditButton' data-toggle='modal' data-target='#editingTaskInformModalForm'><i class='fas fa-edit'></i></button>"
                    taskList += "<button class='btn btn-sm btn-danger mr-2' onclick='deleteTaskInfo("+value.id+")'><i class='fas fa-trash-alt'></i> </button>" +"</td>"
                    taskList += "</tr>";
                })
                $('#taskListInformation').html(taskList)
            },
            error:function(error){
                console.log(error)
                if($('#toDate').val() == ""){
                    $('#toDateError').text(error.responseJSON.errors.toDate)
                }
                if($('#fromDate').val() == ""){
                    $('#fromDateError').text(error.responseJSON.errors.fromDate)
                }
                if($('#employeeName').val() == ""){
                    $('#employeeNameError').text(error.responseJSON.errors.employeeName)
                }
            }
        })
   }
   searchEmployeeTaskInformation()

   // deleting task 
   function deleteTaskInfo(id){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    Swal.fire({
                    title: 'Are you sure?',
                    text: "This Task will be deleted! ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"DELETE",
                            dataType:"json",
                            data:{
                                _token: _token 
                            },
                            url:"/admin/search-task/"+ id,
                            success:function(response){
                                console.log(response)
                                searchEmployeeTaskInformation()
                                
                            },
                            error:function(error){
                                console.log(error)
                            }
                        })
                        Swal.fire(
                        'Deleted!',
                        'Task is Deleted .',
                        'success'
                        )
                    }
                    
                })
   }
   
   // Edit Task Information 

  $(document).ready(function(){
    // clearAppendData()
    $('#taskTableInformation').on('click','.EditButton',function(){
        clearAppendData()
     var currentRow = $(this).closest("tr")
     var  id = currentRow.find("td:eq(0)").text()
     var employeeName = currentRow.find("td:eq(1)").text()
     var task = currentRow.find("td:eq(2)").text()
     var date = currentRow.find("td:eq(3)").text()
     var shift = currentRow.find("td:eq(4)").text()
     var location = currentRow.find("td:eq(5)").text()
     var startTime = currentRow.find("td:eq(6)").text()
     var endTime = currentRow.find("td:eq(7)").text()
     var totalTime = currentRow.find("td:eq(8)").text()

     window.xId = id
     window.xEmployeeName = employeeName
     window.xTask = task 
     window.xDate = date 
     window.xShift = shift 
     window.xLocation = location
     window.xStartTime = startTime 
     window.xEndTime = endTime
       
    
        $('#selectEmployeeTaskLocation').val(location)
        $('#selectEmployeeName').val(employeeName)
        $('#selectEmployeeShift').val(shift)
        $('#selectEmployeeTask').val(task)
        $('#date_field').val(date)
        $('#startTime_field').val(startTime)
        $('#endTime_field').val(endTime)
   })
  
  })

  // clear append data 
  function clearAppendData(){
      $('#date_field').empty()
      $('#startTime_field').empty()
      $('#endTime_field').empty()
  }
  // update task infromation 
  function updateTaskInformation(){
        var id = window.xId
        var employeeName =  $('#selectEmployeeName').val()
        var task = $('#selectEmployeeTask').val() 
        var date = $('#date_field').val()
        var shift = $('#selectEmployeeShift').val()
        var location = $('#selectEmployeeTaskLocation').val()
        var startTime = $('#startTime_field').val()
        var endTime = $('#endTime_field').val()
        console.log(employeeName)
        console.log(task)
        console.log(date)
        console.log(shift)
        console.log(location)
        console.log(startTime)
        console.log(endTime)
        let _token   = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type:"POST",
            dataType:"json",
            data:{
                _token:_token,
                employeeName:employeeName, 
                task:task,
                date:date,
                shift:shift,
                location:location,
                startTime:startTime,
                endTime:endTime,

            },
            url:"/admin/search-task/update/" +id, 
            success:function(response){
                clearAppendData()
                searchEmployeeTaskInformation()
                console.log(response);
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Task Information Is Updated  Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                console.log(error)    
            }
        })
  }
</script>
 
  <!-- Modal -->
  {{-- <button type='button' class='btn btn-primary EditButton' data-toggle='modal' data-target='#editingTaskInformModalForm'><i class='fas fa-trash-alt'></i></button> --}}
  <div class="modal fade" id="editingTaskInformModalForm"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  >
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 700px">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Edit Task Schedule  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           <div class="form-group">
               <div class="row">
                    <div class="col-sm-6">
                        <label class="form-control">Select Date </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" value="" id="date_field" class="form-control">
                    </div>
               </div>
           </div>

           <div class="form-group">
               <div class="row">
                    <div class="col-sm-6">
                        <label class="form-control"> Employee </label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" id="selectEmployeeName">
                            {{-- <option id="employeeName_field"></option> --}}
                            @foreach ($employees as  $employee)
                                <option value="{{$employee->name}}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
               </div>
           </div>
           <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-control">Select Task</label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" id="selectEmployeeTask">
                            @foreach ($tasksList as $task)
                                <option value="{{$task->taskName}}">{{$task->taskName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
           </div>
           <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-control"> Select Location  </label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" id="selectEmployeeTaskLocation">
                            {{-- <option id="location_field"></option> --}}
                            <option value="Factory">Factory</option>
                            <option value="NOC">NOC</option>
                        </select>
                    </div>
                </div>
           </div>
           <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label class="form-control" >Select Shift</label>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" id="selectEmployeeShift" >
                        {{-- <option id="shift_field"></option> --}}
                        <option value="OT-1">OT-1</option>
                        <option value="OT-2">OT-2</option>
                    </select>
                </div>
            </div>
       </div>
           <div class="form-group">
             <div class="row">
                <div class="col-sm-6">
                    <label class="form-control"> In Time  </label>
                </div>
                <div class="col-sm-6">
                    <input type="time" value="" id="startTime_field" class="form-control">
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6">
                    <label class="form-control"> Out Time  </label>
                </div>
                <div class="col-sm-6">
                    <input type="time" value=`${window.startTime}` id="endTime_field" class="form-control">
                </div>
             </div>
           
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="updateTaskInformation()"  data-dismiss="modal" > Update</button>
            <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div> 
   

 
    