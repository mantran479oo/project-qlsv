<!DOCTYPE html>
<html lang="en">
<head>
  <title>quản lý sinh viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 156px;">
     <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
<div class="row">
	<div class="content">
		<div class="center">
		 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Hồ sơ</button>
      <table class="table table-striped">
    <thead>
      <tr>
        <th>Họ và tên</th>
        @foreach($my_points as $class)
        <th>{{ $class->subject_title}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      <tr>
       <td>{{$list_profile->name}}</td>
         @foreach($my_points as $my_points) 
            @if($my_points->number_point != '')   
            <td> {{ $my_points->number_point }}</td>
            @endif
         @endforeach     
      </tr>
    </tbody>
  </table>
      <br>
    </div>
    </div>
</div>
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hồ sơ học sinh</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row">
         	<div class="col-sm-3">
         		<span>Họ và tên</span><br>
         		<span>Ngày sinh</span><br>
         		<span>Tuổi</span><br>
         		<span>Lớp</span><br>
         		<span>Quê quán</span>
         	</div>
         	<div class="col-sm-9">
         
         		<span>{{ $list_profile->name }}</span><br>
         		<span>{{ date('d/m/Y', strtotime($list_profile->date)) }}</span><br>
         		<span>{{ $list_profile->olds }}</span><br>
         		<span>{{ $list_profile->class_name }}</span><br>
         		<span>{{ $list_profile->address }}</span>
        
         	</div>
         </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</body>
</html>