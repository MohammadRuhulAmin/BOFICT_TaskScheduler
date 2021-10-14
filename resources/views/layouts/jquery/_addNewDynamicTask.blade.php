<script>
    
    $(document).ready(function() {
        
        var i = 1;
        
       $('#addDynamicTaskInput').click(function(){
        event.preventDefault();
           i++;  
           $('#dynamic_fieldInput').append(
            `<div class='row'>
                <div class='col-sm-6'>
                    <select class='form-control' name='taskList[]' id='searchableSelectOption_'+'i'>
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
           </div>`);
          
       })

      
       
       
    });

</script>
{{-- $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); --}} 
{{-- <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class='fas fa-trash'></i></button> --}}