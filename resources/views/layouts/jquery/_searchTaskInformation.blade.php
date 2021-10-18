
<script>
    //   var currentRow_global = ""
    //   var id_global = ""
    //   var employeeName_global = ""
    //   var task_global = ""
    //   var date_global = ""
    //   var shift_global = ""
    //   var location_global = "" 
    //   var startTime_global = ""
    //   var endTime_global =""
    //   var totalTime_global =""
    
    
    
    
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

      $('#employeeName_field').append('<option>'+ employeeName +'</option>');
      $('#location_field').val(location)
      $('#date_field').val(date)
      $('#shift_field').append('<option>'+ shift +'</option>')
      $('#startTime_field').val(startTime)
      $('#endTime_field').val(endTime)
      $('#location_field').append('<option>'+ location +'</option>');
       
     
   })
  
  })

  // clear append data 
  function clearAppendData(){
    $('#employeeName_field').empty();
      $('#location_field').empty()
      $('#date_field').empty()
      $('#shift_field').empty()
      $('#startTime_field').empty()
      $('#endTime_field').empty()
      $('#location_field').empty()
  }
  // update task infromation 
  function updateTaskInformation(){
        var id = id
        console.log(id)
        var employeeName = employeeName
        var task = task
        var date = date
        var shift = shift
        var location = location
        var startTime = startTime
        var endTime = endTime
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            dataType:"json",
            data:{
                _token:_token , 
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
                console.log(id)
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
                        <input type="date" id="date_field" class="form-control">
                    </div>
               </div>
           </div>

           <div class="form-group">
               <div class="row">
                    <div class="col-sm-6">
                        <label class="form-control"> Employee </label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option id="employeeName_field"></option>
                            @foreach ($employees as  $employee)
                                <option>{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
               </div>
                
                
           </div>
           <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-control">Select Location</label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option id="location_field"></option>
                            <option>Factory</option>
                            <option>NOC</option>
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
                    <select class="form-control"  >
                        <option id="shift_field"></option>
                        <option>OT-1</option>
                        <option>OT-2</option>
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
                    <input type="time" id="startTime_field" class="form-control">
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6">
                    <label class="form-control"> Out Time  </label>
                </div>
                <div class="col-sm-6">
                    <input type="time" id="endTime_field" class="form-control">
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
   

 
    