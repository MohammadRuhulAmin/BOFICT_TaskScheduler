<script>
   
    
    $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         })
    // show all notices list 
    function showAllNotices(){
       $.ajax({
           type:"GET",
           dataType:"json",
           url:"{{route('notices.index')}}",
           success:function(response){
               console.log(response)
               //start
               var noticeList = "";
                $.each(response,function(key,value){
                    noticeList  += "<tr>"
                    noticeList  += "<td>" + value.id + "</td>"
                    noticeList  += "<td>" + value.noticeTitle + "</td>"
                    noticeList  += "<td>" + value.noticeDescription + "</td>"
                    noticeList  += "<td>" + value.isActive + "</td>"
                    noticeList +="<td>"+ "<button class='btn btn-sm btn-primary mr-2' onclick='editNoticeInformation("+value.id+")'> <i class='fas fa-edit'></i></button>" 
                    noticeList += "<button class='btn btn-sm btn-danger mr-2' onclick='deleteNotice("+value.id+")'><i class='fas fa-trash-alt'></i> </button>" +"</td>"
                    noticeList += "</tr>";
                })
                $('#noticeTableBody').html(noticeList)
               //end
               
           },
           error:function(error){
               console.log(error)
           }
       })
    }
    showAllNotices()
    // add new Notice 
    function addNewNotice(){
        var noticeTitle = $('#noticeTitle').val()
        var noticeDescription = $('#noticeDescription').val()
        var isActive = $('#isActive').val()
        let _token   = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type:"POST",
            dataType:"json",
            url:"{{route('notices.store')}}",
            data:{
                noticeTitle:noticeTitle, 
                noticeDescription:noticeDescription,
                isActive:isActive,
                _token:_token,
            },
            success:function(response){
                console.log(response)
                $('#noticeTitle').val('');
                $('#noticeDescription').val('')
                showAllNotices()
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'New Notice is Created Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                 console.log(error)
                    $('#noticeTitleError').text('');
                    $('#noticeDescriptionError').text('')
                    if($('#noticeTitle').val() == ""){
                        $('#noticeTitleError').text(error.responseJSON.errors.noticeTitle);
                    }
                    if($('#noticeDescription').val() == ""){
                        $('#noticeDescriptionError').text(error.responseJSON.errors.noticeDescription);
                    }
                   
            }
        })
    }

    // delete Notice 
    function deleteNotice(id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        Swal.fire({
                    title: 'Are you sure?',
                    text: "This Notice will be deleted! ",
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
                            url:"/admin/notices/"+ id,
                            success:function(response){
                                console.log(response)
                               showAllNotices()
                                
                            },
                            error:function(error){
                                console.log(error)
                            }
                        })
                        Swal.fire(
                        'Deleted!',
                        'Notice is Deleted .',
                        'success'
                        )
                    }
                    
                })
                      

    }

    // Edit Notice
    function editNoticeInformation(id){
        $.ajax({
        type:"GET",
        dataType:"json",
        url:"/admin/notices/" + id + "/edit",
        success:function(data){
            console.log(data);
            $('#id').val(data.id)
            $('#noticeTitle').val(data.noticeTitle)
            $('#noticeDescription').val(data.noticeDescription)
            $('#noticeId').val(data.id)
            $('#addNoticeButton').hide()
            $('#updateNoticeButton').show()
            $('#labelNoticeAdd').hide()
            $('#labelNoticeUpdate').show()
        }
    })
    }
    // update notice 
    function updateNoticeInformation(){
        var id = $('#noticeId').val()
        var noticeTitle = $('#noticeTitle').val()
        var noticeDescription = $('#noticeDescription').val()
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"PUT",
            dataType:"json",
            data:{
                _token:_token , 
                noticeTitle:noticeTitle,
                noticeDescription:noticeDescription,
            },
            url:"/admin/notices/"+id,
            success:function(response){
                $('#noticeTitleError').text('')
                $('#noticeDescriptionError').text('')
                $('#noticeTitle').val('');
                $('#noticeDescription').val('');
                $('#noticeId').val('');
                $('#addNoticeButton').show()
                $('#updateNoticeButton').hide()
                $('#labelNoticeAdd').show()
                $('#labelNoticeUpdate').hide()
                showAllNotices()
                console.log(response);
                Swal.fire({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Notice Is Updated  Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error:function(error){
                console.log(error)
                    $('#noticeTitleError').text('')
                    $('#noticeDescriptionError').text('')
                  
                    if($('#noticeTitleError').val() == ""){
                        $('#noticeTitleError').text(error.responseJSON.errors.noticeTitle);
                    }
                    if($('#noticeDescriptionError').val() == ""){
                        $('#noticeDescriptionError').text(error.responseJSON.errors.noticeDescription);
                    }
                    
            }
        })
    }




</script>