<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bangladesh Ordnance Factories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      h1{
          font-size: 40px;
      }
      h2{
          font-size:40px;
      }
  </style>
</head>
<body>
<div class="card m-3">
    <div class="row">
        <div class="col-sm-6 m-2">
            <div class="card">
                <h1 align="center"> Today </h1>
                <h1 align="center"> Location - NOC </h1>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_NOC[0]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_NOC[0]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_NOC[0]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[0]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_NOC[0]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_NOC[1]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_NOC[1]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_NOC[1]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[1]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_NOC[1]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_NOC[2]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_NOC[2]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_NOC[2]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[2]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_NOC[2]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        @if ( !empty($combineAllInformation_today_NOC[3]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_NOC[3]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_NOC[3]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[3]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_NOC[3]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_NOC[4]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_NOC[4]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_NOC[4]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[4]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_NOC[4]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_NOC[5]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_NOC[5]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_NOC[5]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[5]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_NOC[5]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <h1 align="center">Location - Factory </h1>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_Factory[0]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_Factory[0]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_Factory[0]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_Factory[0]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_Factory[0]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_Factory[1]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_Factory[1]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_Factory[1]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_Factory[1]['taskList']['endTime']}}</h2></td>
                                    </tr>

                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_Factory[1]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_Factory[2]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_Factory[2]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_Factory[2]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_NOC[2]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_Factory[2]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_Factory[3]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_Factory[3]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_Factory[3]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_Factory[3]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_Factory[3]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_Factory[4]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_Factory[4]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_Factory[4]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_Factory[4]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_Factory[4]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_today_Factory[5]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_today_Factory[5]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_today_Factory[5]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_today_Factory[5]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_today_Factory[5]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
                

            </div>
            
           
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h1 align="center"> Tomorrow </h1>
                <h1 align="center"> Location - NOC </h1>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_NOC[0]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_NOC[0]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[0]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[0]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_NOC[0]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_NOC[1]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_NOC[1]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[1]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[1]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_NOC[1]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_NOC[2]))
                        <div class="card">
                            <div class="card-body">
                                @if (1<count($combineAllInformation_tomorrow_NOC))
                                    
                                @endif
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_NOC[2]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[2]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[2]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_NOC[2]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_NOC[3]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_NOC[3]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[3]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[3]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_NOC[3]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_NOC[4]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_NOC[4]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[4]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[4]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_NOC[4]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_NOC[5]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_NOC[5]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[5]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_NOC[5]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_NOC[5]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <h1 align="center"> Location - Factory  </h1>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_Factory[0]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_Factory[0]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[0]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[0]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_Factory[0]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_Factory[1]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_Factory[1]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[1]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[1]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_Factory[1]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_Factory[2]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_Factory[2]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[2]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[2]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_Factory[2]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_Factory[3]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_Factory[3]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[3]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2> OUT </h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[3]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3> Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_Factory[3]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_Factory[4]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_Factory[4]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[4]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>OUT</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[4]['taskList']['endTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_Factory[4]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($combineAllInformation_tomorrow_Factory[5]))
                        <div class="card">
                            <div class="card-body">
                                <img width="300px" height="300px" src="{{url('storage/'.$combineAllInformation_tomorrow_Factory[5]['employeeDetails']['image'])}}"/>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h2>IN</h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[5]['taskList']['startTime']}}</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2> OUT </h2></td><td><h2>{{$combineAllInformation_tomorrow_Factory[5]['taskList']['endTime']}}</h2></td>
                                    </tr>

                                    <tr>
                                        <td><h3>Total </h3></td><td><h3>{{$combineAllInformation_tomorrow_Factory[5]['taskList']['totalTime']}}</h3></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>



