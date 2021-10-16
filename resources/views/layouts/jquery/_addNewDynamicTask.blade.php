
<script>
    $(document).ready(function() {
        // select 
        // function filterFunction() {
        //     var input, filter, ul, li, a, i;
        //     input = document.getElementById("selectTask");
        //     filter = input.value.toUpperCase();
        //     div = document.getElementById("myDropdown");
        //     a = div.getElementsByTagName("a");
        //     for (i = 0; i < a.length; i++) {
        //         txtValue = a[i].textContent || a[i].innerText;
        //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //         a[i].style.display = "";
        //         } else {
        //         a[i].style.display = "none";
        //         }
        //     }
        // }
        // filterFunction()

        //end select
        
        
        
        var i = 1;
       $('#addDynamicTaskInput').click(function(){
        event.preventDefault();
           i++;
           $('#dynamic_fieldInput').append(
            `<div class='row' id='row_${i}'>
                        <div class='col-sm-4'>
            <select class='form-control' id='selectTask' name='taskList[]'>
            @foreach ($tasks as $task )
                <option>{{$task->taskName}} </option>
            @endforeach
            </select>
        </div>
        <div class='col-sm-3'> <input type='date' name='dateList[]'  class='form-control'> </div>
        <div class='col-sm-1'><select class='form-control' name='locationList[]' ><option>Factory</option><option>NOC</option></select>  </div>
        <div class='col-sm-1'> <select class='form-control' name='shiftList[]' ><option>OT-1</option> <option>OT-2</option></select></div>
        <div class='col-sm-1'> <input type='time' name='startTimeList[]'  class='form-control'> </div>
        
        <div class='col-sm-1'>
        <input type='time' name='endTimeList[]'  class='form-control'>
        </div>
        <div class='col-sm-1'>
        <button type="button" name="remove" id='${i}'  class="btn btn-danger btn_remove"><i class='fas fa-trash'></i></button>   

           </div>`);
       })
      
       $(document).on('click','.btn_remove',function(){
           var deleteButtonId = $(this).attr("id")
           console.log("row_"+deleteButtonId)
           $('#row_'+deleteButtonId).remove();
       })
       
      
        
    });


</script>


{{-- <div class='col-sm-6'>
    <select class='form-control' id='selectTask' name='taskList[]'>
    @foreach ($tasks as $task )
        <option>{{$task->taskName}} </option>
    @endforeach
    </select>
</div>
<div class='col-sm-3'> <input type='date' name='dateList[]'  class='form-control'> </div>
<div class='col-sm-1'> <input type='time' name='startTimeList[]'  class='form-control'> </div>
<div class='col-sm-1'>
<input type='time' name='endTimeList[]'  class='form-control'>
</div>
<div class='col-sm-1'>
<button type="button" name="remove" id='${i}'  class="btn btn-danger btn_remove"><i class='fas fa-trash'></i></button> --}}


