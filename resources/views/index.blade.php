<!DOCTYPE html>
<html lang="en">
<head>
  <title>quản lý sinh viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">
  <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 156px;">
     <li><a href="{{ route('students.logout') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
<div class="row">
	<div class="content">
		<div class="center" style="margin-left: 331px;">
		 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Hồ sơ</button>
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Họ và tên</th> 
                @foreach ($list_subject as $subject)
                    <th>{{$subject->subject_title}}</th>
                @endforeach
            </tr>
          </thead>
          <tbody>
            <tr>  
              @foreach ($list_profile as $my_point)
              <td>{{$my_point->name}}</td>   
               @foreach($my_point->articlePoints as $point)
                <td>{{$point->number_point}}</td>   
               @endforeach
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
         @foreach ($list_profile as $my_profile)
         		<span>{{ $my_profile->name }}</span><br>
         		<span>{{ date('d/m/Y', strtotime($my_profile->date)) }}</span><br>
         		<span>{{ $my_profile->olds }}</span><br>
         		<span>{{ $my_profile->articleClass->class_name }}</span><br>
         		<span>{{ $my_profile->address }}</span>
         @endforeach
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