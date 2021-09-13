<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Admin</title>
</head>
<body style="margin-top: 156px;">
  <div class="container">
    <table class="table table-bordered">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#listscore">
    Xem điểm
  </button>
      <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal">Thêm</button>
      <thead>
        <tr>
          <th>Mã học sinh</th>
          <th>Tên</th>
          <th>Giới tính</th>
          <th>Tuổi</th>
          <th>Ngày sinh</th>
          <th>Lớp</th>
          <th>Sở thích</th>
          <th>Địa chỉ</th>
          <th>Hành động</th>
        </tr>
      </thead>
     
      <tbody>
        @foreach($list_user as $list_user)
        @php
        $gender = $list_user->gender === 1 ? 'Nam' :'Nữ'; 
        @endphp
        <tr>
          <td>{{ $list_user->student_code }}</td>
          <td>{{ $list_user->name }}</td>
          <td>{{  $gender }}</td>
          <td>{{ $list_user->olds }}</td>
          <td>{{date('d/m/Y', strtotime($list_user->date)) }}</td>
          <td>{{ $list_user->class_name }}</td>
          <td>{{ $list_user->hobby }}</td>
          <td>{{ $list_user->address }}</td>
          <td>
            <form method="get">
            <button type="submit" formaction="{{ route('set_edit',['id'=>$list_user->id])}}" className="btn btn-success" >Sửa</button>&nbsp;
            <button type="submit" formaction="{{ route('destroy',['id'=>$list_user->id])}}" className="btn btn-danger">xóa</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


   <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm học sinh</h4>     
          <button type="button" class="close" data-dismiss="modal">&times;</button><br>
          <form action="{{ route('set_add') }}" method="post">
            @csrf
         <div class="row">
            <div class="col-sm-9"> </div>
          <div class="col-sm-3 form-group">
            <label for="sel1">Lớp:</label>
            <select class="form-control" name="class" id="sel1">
              @foreach($list_class as $class)
              <option value="{{ $class->class_code }}">{{ $class->class_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="row">
             <div class="col-sm-6">
               <div class="form-group">
                <label for="usr">Họ tên:</label>
                <input type="text" class="form-control" name="username" required id="usr">
              </div>

              <div class="form-group">
                <label for="usr">Địa chỉ:</label>
                <input type="text" class="form-control" required name="address" id="usr">
              </div>
              <div class="form-group">
                <label for="comment">Sở thích:</label>
                <textarea class="form-control" rows="5" required name="hobby" id="comment"></textarea>
              </div>

             </div>

             <div class="col-sm-6">
               <div class="form-group">
                  <label for="usr">Ngày sinh:</label>
                  <input type="date" class="form-control" required name="date" id="usr">
                </div>

                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" value="1" class="form-check-input" required name="gender"> Nam
                  </label>
                </div>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" value="2" class="form-check-input" required name="gender"> Nữ
                  </label>
                </div>
</br>
               @foreach($list_subject as $subjects)
                 <div class="form-group">
                <label for="usr">{{ $subjects->subject_title}}:</label>
                <input type="text" required class="form-control" name="{{ $subjects->subject_code }}" id="usr">
              </div>
              @endforeach
             </div>
           </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" >Thêm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
         </form>
      </div>
    </div>
  </div>


  <!-- The Modal -->
  <div class="modal fade" id="listscore">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Danh sách điểm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Họ tên</th>
        <th>Lớp</th>
        @foreach($list_subject as $subject)
         <th>{{$subject->subject_title}}</th> 
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($list as $information)
         <tr>
            <td>{{ $information->name}}</td>
            @foreach($list_class as $compare_class)
              @if($compare_class->class_code === $information->class_code)
                  <td>{{ $compare_class->class_name }}</td>
              @endif
            @endforeach
           @foreach($information->points as $list_point)
                @foreach($list_subject as $ckeck)
                  @if($ckeck->subject_code === $list_point->subject_code)
                <td>{{ $list_point->number_point }}</td>
                  @endif
                @endforeach
           @endforeach
         </tr>
      @endforeach
    </tbody>
  </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</body>
</html>