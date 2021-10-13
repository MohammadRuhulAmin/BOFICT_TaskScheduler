<!DOCTYPE html>
<html lang="en">
<head>
 
	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/css/main.css')}}">
<!--===============================================================================================-->
<style type="text/css">
    /* .testing {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
    } */
    </style>

</head>
<body>
	 <div>
         {{-- {{dd($combineAllInformation)}} --}}
         {{-- @foreach(json_decode($h->before, true) as $key => $value)
                {{ $key }} - {{ $value }}, 
            @endforeach --}}
           
     </div>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 testing ver2 m-b-110">
                    {{-- Style="position: absolute;  height: 100%; width: 100%"; --}}
					<table data-vertable="ver2">
						<thead>
							<tr class="row100 head">
								<th >Name</th>
                                <th > Image  </th>
								<th > Designation </th>
								<th > BOF ID   </th>
                                <th > Task   </th>
								<th > Task Details  </th>
								<th > Date  </th>
                                <th > Time </th>
							</tr>
						</thead>
						<tbody>
                            @for ($i = 0;$i<count($combineAllInformation);$i++)
                            <tr class="">
								<td >{{$combineAllInformation[$i]['employeeDetails']['name']}}</td>
                                <td > <img width="64px" src="{{url('storage/'.$combineAllInformation[$i]['employeeDetails']['image'])}}"/></td> 
								<td > {{$combineAllInformation[$i]['employeeDetails']['designation']}} </td>
								<td >{{$combineAllInformation[$i]['employeeDetails']['bofid']}}</td>
                                <td > {{$combineAllInformation[$i]['taskList']['task']}} </td>
								<td >{{$combineAllInformation[$i]['taskDetails']['taskDetails']}}</td>
								<td >{{$combineAllInformation[$i]['taskList']['date']}}</td>
                                <td >{{$combineAllInformation[$i]['taskList']['time']}}</td>
							</tr>
                            @endfor
                          
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('TableDashboard/Table_Highlight_Vertical_Horizontal/js/main.js')}}"></script>

</body>
</html>