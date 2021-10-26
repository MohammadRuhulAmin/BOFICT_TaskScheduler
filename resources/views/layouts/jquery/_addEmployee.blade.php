<script>
    
     $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         })
    
    $('#labelEmployeeAdd').show();
    $('#addEmployeeButton').show();
    $('#labelEmployeeUpdate').hide();
    $('#updateEmployeeButton').hide();

    function clearInputField(){
        $('#employeeName').val('');
        $('#employeeDesignation').val('');
        $('#employeeId').val('');
        $('#employeeNameError').text('');
        $('#employeeDesignationError').text('');
        $('#employeeIdError').text('');
        $('#employeeImage').val('')
    }
   
    // function add employee
    function addNewEmployee(){
        // var employeeImage = $('#employeeImage').val()
        var employeeName = $('#employeeName').val()
        var employeeDesignation = $('#employeeDesignation').val()
        var employeeId = $('#employeeId').val()
        console.log(employeeName)
        console.log(employeeDesignation)
        console.log(employeeId)
        console.log(employeeImage)
        let _token   = $('meta[name="csrf-token"]').attr('content') 
        // image upload 
        // Get the selected file
            var employeeImage = $('#employeeImage')[0].files;
            var employeeFormData  = new FormData();
            // Append data 
            employeeFormData.append('employeeImage',employeeImage[0]);
            employeeFormData.append('employeeName',employeeName);
            employeeFormData.append('employeeDesignation', employeeDesignation);
            employeeFormData.append('employeeId',employeeId);
            employeeFormData.append('_token',_token);

        //end image upload
        
        $.ajax({
            type:"POST",
            dataType:"json",
            contentType: false,
            processData: false,
            data:employeeFormData,
            url:"{{route('employees.store')}}",
            success:function(data){
                $('#employeeName').val('');
                $('#employeeDesignation').val('');
                $('#employeeId').val('');
                showAllEmployeeList();
                console.log(data);
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'New Employee Is Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                    $('#employeeNameError').text('');
                    $('#employeeDesignationError').text('');
                    $('#employeeIdError').text('');
                    if($('#employeeName').val() == ""){
                        $('#employeeNameError').text(error.responseJSON.errors.employeeName);
                    }
                    if($('#employeeDesignation').val() == ""){
                        $('#employeeDesignationError').text(error.responseJSON.errors.employeeDesignation);
                    }
                    if($('#employeeId').val() == ""){
                        $('#employeeIdError').text(error.responseJSON.errors.employeeId);
                    }
                   
            }
        })
        
        
        
       

    }

    // function show all employee list 

    function showAllEmployeeList(){
        $.ajax({
            type:"GET",
            dataType:"json",
            url:"{{route('employees.index')}}",
            success:function(response){
                var employeeList = "";
                $.each(response,function(key,value){
                    employeeList  += "<tr>"
                    employeeList  += "<td>" + value.id + "</td>"
                    
                    employeeList  += "<td>" +'<img src="{{asset('storage')}}/'+value.image+'"  width="64px">' + "</td>"
                    employeeList  += "<td>" + value.bofid + "</td>"
                    employeeList  += "<td>" + value.name + "</td>"
                    employeeList  += "<td>" + value.designation + "</td>"
                    employeeList +="<td>"+ "<button class='btn btn-sm btn-primary mr-2' onclick='editEmployeeInformation("+value.id+")'> <i class='fas fa-edit'></i></button>" 
                    employeeList += "<button class='btn btn-sm btn-danger mr-2' onclick='deleteEmployee("+value.id+")'><i class='fas fa-trash-alt'></i> </button>" +"</td>"
                    employeeList += "</tr>";
                })
                $('#employeeTableBody').html(employeeList)
            }
        })
    }

    showAllEmployeeList();

    // function edit employee information
    function editEmployeeInformation(id){
        $.ajax({
        type:"GET",
        dataType:"json",
        url:"/admin/employees/" + id + "/edit",
        success:function(data){
            console.log(data);
            $('#id').val(data.id)
            $('#employeeName').val(data.name)
            $('#employeeDesignation').val(data.designation)
            $('#employeeId').val(data.bofid)
            
            $('#addEmployeeButton').hide()
            $('#updateEmployeeButton').show()
            $('#labelEmployeeAdd').hide();
            $('#labelEmployeeUpdate').show();
        }
    })
    }
    // function update employee Information 
    function updateEmployeeInformation(){
        var id = $('#id').val()
        var employeeName = $('#employeeName').val()
        var employeeId = $('#employeeId').val()
        var employeeDesignation = $('#employeeDesignation').val()
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"PUT",
            dataType:"json",
            data:{
                _token:_token , 
                employeeName:employeeName,
                employeeId:employeeId,
                employeeDesignation:employeeDesignation,
            },
            url:"/admin/employees/" +id, 
            success:function(response){
                $('#employeeName').val('');
                $('#employeeDesignation').val('');
                $('#employeeId').val('');
                showAllEmployeeList()
                $('#addEmployeeButton').show()
                $('#updateEmployeeButton').hide()
                $('#labelEmployeeAdd').show()
                $('#labelEmployeeUpdate').hide()
                console.log(response);
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Employee Is Updated  Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                console.log(error)
                $('#employeeNameError').text('');
                    $('#employeeDesignationError').text('');
                    $('#employeeIdError').text('');
                    if($('#employeeName').val() == ""){
                        $('#employeeNameError').text(error.responseJSON.errors.employeeName);
                    }
                    if($('#employeeDesignation').val() == ""){
                        $('#employeeDesignationError').text(error.responseJSON.errors.employeeDesignation);
                    }
                    if($('#employeeId').val() == ""){
                        $('#employeeIdError').text(error.responseJSON.errors.employeeId);
                    }
            }
        })
    }
    // function delete employee
    function deleteEmployee(id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        Swal.fire({
                    title: 'Are you sure?',
                    text: "This Employee will be deleted! ",
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
                            url:"/admin/employees/"+ id,
                            success:function(response){
                                console.log(response)
                                showAllEmployeeList()
                                
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

