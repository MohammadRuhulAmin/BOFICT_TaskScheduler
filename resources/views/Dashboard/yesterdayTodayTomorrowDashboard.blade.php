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
  <h2 style="color: red;"> <marquee behavior="" direction=""> Bangladesh Ordnance Factories ( ICT CELL ) //  {{$NewNotice->noticeDescription}}   </marquee></h2>
  <div class="card">
    <div class="card-header"><h3 align="center">Today Task List </h3></div>
    <div class="card-body">
        <table class="table table-sm table-striped">
            <thead>
                <th>Day</th>
                <th>Date</th>
                <th>Image</th>
                <th>Employee Name </th>
                <th>Designation</th>
                <th>Location</th>
                <th>Task</th>
                <th>In</th>
                <th>Out</th>
                <th>Total Time </th>
            </thead>
            @for ($i = 0;$i<count($combineAllInformation_today);$i++)
                <tr>
                    <td width='10%'>{{$combineAllInformation_today[$i]['dayName']}}</td>
                    <td>{{$combineAllInformation_today[$i]['taskList']['date']}}</td>
                    <td><img width="64px" src="{{url('storage/'.$combineAllInformation_today[$i]['employeeDetails']['image'])}}"/></td>
                    <td>{{$combineAllInformation_today[$i]['employeeDetails']['name']}}</td>
                    <td>{{$combineAllInformation_today[$i]['employeeDetails']['designation']}}</td>
                    <td>{{$combineAllInformation_today[$i]['taskList']['location']}}</td>
                    <td>{{$combineAllInformation_today[$i]['taskList']['task']}}</td>
                    <td>{{$combineAllInformation_today[$i]['taskList']['startTime']}}</td>
                    <td>{{$combineAllInformation_today[$i]['taskList']['endTime']}}</td>
                    <td>{{$combineAllInformation_today[$i]['taskList']['totalTime']}}</td>
                </tr>
            @endfor
        </table>
    </div>
  </div>
  <div class="card">
    <div class="card-header"><h3 align="center">Tomorrow  Task List </h3></div>
    <div class="card-body">
        <table class="table table-sm table-striped">
            <thead>
                <th>Day</th>
                <th>Date</th>
                <th>Image</th>
                <th>Employee Name </th>
                <th>Designation</th>
                <th>Location</th>
                <th>Task</th>
                <th>In</th>
                <th>Out</th>
                <th>Total Time </th>
            </thead>
            @for ($i = 0;$i<count($combineAllInformation_tomorrow);$i++)
                <tr>
                    <td width='10%'>{{$combineAllInformation_tomorrow[$i]['dayName']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['taskList']['date']}}</td>
                    <td><img width="64px" src="{{url('storage/'.$combineAllInformation_tomorrow[$i]['employeeDetails']['image'])}}"/></td>
                    <td>{{$combineAllInformation_tomorrow[$i]['employeeDetails']['name']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['employeeDetails']['designation']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['taskList']['location']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['taskList']['task']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['taskList']['startTime']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['taskList']['endTime']}}</td>
                    <td>{{$combineAllInformation_tomorrow[$i]['taskList']['totalTime']}}</td>
                </tr>
            @endfor
        </table>
        
    </div>
  </div>

  <div class="card">
    <div class="card-header"><h3 align="center">Yesterday Task List </h3></div>
    <div class="card-body">
        <table class="table table-sm table-striped">
            <thead>
                <th>Day</th>
                <th>Date</th>
                <th>Image</th>
                <th>Employee Name </th>
                <th>Designation</th>
                <th>Location</th>
                <th>Task</th>
                <th>In</th>
                <th>Out</th>
                <th>Total Time </th>
            </thead>
            @for ($i = 0;$i<count($combineAllInformation_yesterday);$i++)
                <tr>
                    <td width='10%'>{{$combineAllInformation_yesterday[$i]['dayName'] }}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['taskList']['date']}}</td>
                    <td><img width="64px" src="{{url('storage/'.$combineAllInformation_yesterday[$i]['employeeDetails']['image'])}}"/></td>
                    <td>{{$combineAllInformation_yesterday[$i]['employeeDetails']['name']}}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['employeeDetails']['designation']}}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['taskList']['location']}}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['taskList']['task']}}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['taskList']['startTime']}}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['taskList']['endTime']}}</td>
                    <td>{{$combineAllInformation_yesterday[$i]['taskList']['totalTime']}}</td>
                </tr>
            @endfor
        </table>
        
    </div>
  </div>
  

</body>
<script type="text/javascript">
  setTimeout(function(){
      location.reload();
  },8000000);
</script>
</html>

