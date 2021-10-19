<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bangladesh Ordnance Factories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


  <h2 style="color: red;"> <marquee behavior="" direction=""> Bangladesh Ordnance Factories ( ICT CELL )  </marquee></h2>
  <h3 align="center">Weekly Task Schedule</h3>
  <div class="card-header"><h1  class="card-title text-center"> Shift - 1<sup>st</sup> </h1></div>
  <table class="table table-sm table-striped m-3">
    <thead>
         <th> Day   </th>
         <th> Date  </th>
         <th> Image </th>
         <th> Employee Name  </th>
         <th> Employee Designation </th>
         <th> Location </th>
         <th> Task </th>
         <th> In </th>
         <th> Out </th>
         <th> Total Time </th>
    </thead>
    <tbody>
       @for ($i = 0;$i<count($combineAllWeeklyInformation_shift_1);$i++)
       <tr>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['dayName']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['date']}}</td>
         <td><img width="64px" src="{{url('storage/'.$combineAllWeeklyInformation_shift_1[$i]['employeeImage']->image)}}"/></td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['employeeName']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['employeeDesignation']->designation}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['location']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['employeeTask']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['startTime']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['endTime']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_1[$i]['totalTime']}}</td>
     </tr>
       @endfor
            
        
    </tbody>
</table>
<div class="card-header"><h1  class="card-title text-center"> Shift - 2<sup>nd</sup> </h1></div>
<table class="table table-sm table-striped m-3">
    <thead>
         <th> Day </th>
         <th> Date </th>
         <th> Image </th>
         <th> Employee Name  </th>
         <th> Employee Designation </th>
         <th> Location  </th>
         <th> Task </th>
         <th> In </th>
         <th> Out </th>
         <th> Total Time </th>
    </thead>
    <tbody>
       @for ($i = 0;$i<count($combineAllWeeklyInformation_shift_2);$i++)
       <tr>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['dayName']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['date']}}</td>
         <td><img width="64px" src="{{url('storage/'.$combineAllWeeklyInformation_shift_2[$i]['employeeImage']->image)}}"/></td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['employeeName']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['employeeDesignation']->designation}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['location']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['employeeTask']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['startTime']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['endTime']}}</td>
         <td>{{$combineAllWeeklyInformation_shift_2[$i]['totalTime']}}</td>
     </tr>
       @endfor
            
        
    </tbody>
</table>


</body>
<script type="text/javascript">
  setTimeout(function(){
      location.reload();
  },8000000);
</script>
</html>

