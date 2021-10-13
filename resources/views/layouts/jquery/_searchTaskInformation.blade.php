<script>
    function clearError(){
            $('#fromDateError').text('')
            $('#toDateError').text('')
            $('#employeeNameError').text('')
    }
    clearError()
   function searchEmployeeTaskInformation(){

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
                    taskList  += "<tr>"
                    taskList  += "<td>" + value.id + "</td>"
                    // employeeList  += "<td>" +'<img src="{{asset('storage')}}/'+value.image+'"  width="64px">' + "</td>"
                    taskList  += "<td>" + value.employeeName + "</td>"
                    taskList  += "<td>" + value.task + "</td>"
                    taskList  += "<td>" + value.date + "</td>"
                    taskList  += "<td>" + value.time + "</td>"
                    //employeeList +="<td>"+ "<button class='btn btn-sm btn-primary mr-2' onclick='editEmployeeInformation("+value.id+")'> <i class='fas fa-edit'></i></button>" 
                    //employeeList += "<button class='btn btn-sm btn-danger mr-2' onclick='deleteEmployee("+value.id+")'><i class='fas fa-trash-alt'></i> </button>" +"</td>"
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

</script>