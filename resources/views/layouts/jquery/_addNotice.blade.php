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




</script>