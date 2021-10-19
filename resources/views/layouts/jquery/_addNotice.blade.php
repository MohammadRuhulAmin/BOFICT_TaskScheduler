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




</script>