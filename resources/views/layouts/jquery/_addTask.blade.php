<script>
   
   $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         })
         
    $('#labelTaskAdd').show();
    $('#addTaskButton').show();
    $('#labelTaskUpdate').hide();
    $('#updateTaskButton').hide();


    function clearInputField(){
        $('#taskName').val('');
        $('#taskDetails').val('');
        $('#taskNameError').text('');
    }

    // function add Task 
    function addNewTask(){
        var taskName = $('#taskName').val()
        var taskDetails = $('#taskDetails').val()
        console.log(taskName)
        console.log(taskDetails)
        let _token = $('meta[name="csrf-token"]').attr('content') 
        //end image upload
        
        $.ajax({
            type:"POST",
            dataType:"json",
            data:{
                _token:_token,
                taskName:taskName,
                taskDetails:taskDetails,
            },
            url:"{{route('assigntasks.store')}}",
            success:function(data){
                clearInputField()
                showAllTaskList()
                console.log(data)
                 
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'New Task  Is Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                console.log(error)
                    $('#taskNameError').text('')
                    $('#taskDetailsError').text('')
                   
                    if($('#taskNameError').val() == ""){
                        $('#taskNameError').text(error.responseJSON.errors.taskName);
                    }
                    if($('#taskDetailsError').val() == ""){
                        $('#taskDetailsError').text(error.responseJSON.errors.taskDetails);
                    }
            }
        })

    }
    //function show all task list
    function showAllTaskList(){
        $.ajax({
            type:"GET",
            dataType:"json",
            url:"{{route('assigntasks.index')}}",
            success:function(response){
                var tasksList = ""
                $.each(response,function(key,value){
                        tasksList  += "<tr>"
                        tasksList  += "<td>" + value.id + "</td>"
                        tasksList  += "<td>" + value.taskName + "</td>"
                        tasksList  += "<td>" + value.taskDetails + "</td>"
                        tasksList +="<td>"+ "<button class='btn btn-sm btn-primary mr-2' onclick='editTaskInformation("+value.id+")'> <i class='fas fa-edit'></i></button>" 
                        tasksList += "<button class='btn btn-sm btn-danger mr-2' onclick='deleteTask("+value.id+")'><i class='fas fa-trash-alt'></i> </button>" +"</td>"
                        tasksList += "</tr>";
                })
                $('#tasksTableBody').html(tasksList)
            }
        })
    }
    showAllTaskList();

    // function edit task information 

    function editTaskInformation(id){
        $.ajax({
        type:"GET",
        dataType:"json",
        url:"/admin/assigntasks/" + id + "/edit",
        success:function(data){
            console.log(data)
            $('#id').val(data.id)
            $('#taskName').val(data.taskName)
            $('#taskDetails').val(data.taskDetails)
            $('#labelTaskAdd').hide()
            $('#addTaskButton').hide()
            $('#labelTaskUpdate').show()
            $('#updateTaskButton').show()
        }
    })
    }

    // function update Task
    function updateTask(){
        var id = $('#id').val()
        var taskName = $('#taskName').val()
        var taskDetails = $('#taskDetails').val()
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"PUT",
            dataType:"json",
            data:{
                _token:_token , 
                taskName:taskName,
                taskDetails:taskDetails,
            },
            url:"/admin/assigntasks/"+id, 
            success:function(response){
                clearInputField()
                showAllTaskList()
                $('#labelTaskAdd').show();
                $('#addTaskButton').show();
                $('#labelTaskUpdate').hide();
                $('#updateTaskButton').hide();
                console.log(response);
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Task  Is Updated  Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                console.log(error)
                    $('#taskNameError').text('');
                    if($('#taskNameError').val() == ""){
                        $('#taskNameError').text(error.responseJSON.errors.taskName);
                    }
                    
            }
        })
    }

    // function delete task 
      // function delete employee
      function deleteTask(id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        Swal.fire({
                    title: 'Are you sure?',
                    text: "This Task  will be deleted! ",
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
                            url:"/admin/assigntasks/"+ id,
                            success:function(response){
                                console.log(response)
                                showAllTaskList()
                                
                            },
                            error:function(error){
                                console.log(error)
                            }
                        })
                        Swal.fire(
                        'Deleted!',
                        'Employee is Deleted .',
                        'success'
                        )
                    }
                    
                })
           
    }








</script>