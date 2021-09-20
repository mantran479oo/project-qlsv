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
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
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
       @foreach($list_information as $details)
        @php
        $gender = $details->gender === $_GENDER_MALE ? 'Nam' :'Nữ'; 
        @endphp 
        <tr>
          <td>{{$details->student_code}}</td>
          <td>{{$details->name}}</td>
          <td>{{$gender}}</td>
          <td>{{$details->olds}}</td>
          <td>{{date('d/m/Y', strtotime($details->date))}}</td>
          <td>{{$details->articleClass->class_name}}</td>
          <td>{{$details->hobby}}</td>
          <td>{{$details->address}}</td>
          <td>
            <form method="get">
            <button type="submit" formaction="{{ route('admin.set_edit',['id'=>$details->id])}}" className="btn btn-success" >Sửa</button>&nbsp;
            <button type="submit" formaction="{{ route('admin.destroy',['id'=>$details->id])}}" className="btn btn-danger">xóa</button>
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
          <form action="{{ route('admin.set_add') }}" method="post">
            @csrf
         <div class="row">
            <div class="col-sm-9"> </div>
          <div class="col-sm-3 form-group">
            <label for="sel1">Lớp:</label>
            <select class="form-control" name="class_code" id="sel1">
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
                <input type="text" class="form-control" value="{{old('username')}}" name="name"  id="usr">  
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label for="usr">Địa chỉ:</label>
                <input type="text" class="form-control" value="{{old('address')}}" name="address" id="usr">
                @error('address')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
              <div class="form-group">
                <label for="comment">Sở thích:</label>
                <textarea class="form-control" rows="5" value="{{old('hobby')}}"  name="hobby" id="comment"></textarea>
                @error('hobby')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
             </div>

             <div class="col-sm-6">
               <div class="form-group">
                  <label for="usr">Ngày sinh:</label>
                  <input type="date" class="form-control" value="{{old('date')}}"  name="date" id="usr">
                  @error('date')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" value="1" class="form-check-input" name="gender"> Nam
                  </label>
                </div>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" value="0" class="form-check-input"  name="gender"> Nữ
                  </label>
                  @error('gender')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
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
        <table class="table table-bordered" id="table_point">
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
      @foreach($list_information as $list_scores)
         <tr>
            <td>{{$list_scores->name}}</td>
            <td>{{$list_scores->articleClass->class_name}}</td>
            @foreach ($list_scores->articlePoints as $score)
                <td>
                  <input id="score_{{$score->id}}" value="{{$score->number_point}}" class="score" onchange="edit('{{$score->id}}')" style="border:2px;width: 27px;" >
                </td>
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
<script>
function edit(id){
  var point = $("#score_"+id).val();
  $.get('{{route('admin.update_score')}}',{ "id":id ,"point":point },function(data){
          if (data.status == 200) {
            $("#table_point").load("{{ route('admin.index') }} #table_point");
            alertify.success('Cập nhật thành công');
          } 
  });
  
}
</script>