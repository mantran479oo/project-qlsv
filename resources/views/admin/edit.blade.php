<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  @foreach($edit_student as $profile)
  <form action="{{route('admin.update',['id' => $profile->id])}}" method="post">
  	@csrf   
  	 <div class="col-sm-3 form-group">
            <label for="sel1">Lớp:</label>
            <select class="form-control" name="class_code" id="sel1">
               @foreach($list_class as $class)
              <option @if($profile->class_code === $class->class_code) selected @endif value="{{ $class->class_code }}">{{$class->class_name}}</option>
              @endforeach 
            </select>
          </div>
    <div class="row">
      <div class="col-6">
        <input type="text" class="form-control" id="email" value="{{$profile->name}}" name="name"><br>
        <input type="date" class="form-control" value="{{$profile->date}}" name="date"><br>
        <div class="form-group">
		  <label for="comment">Sở thích:</label>
		  <textarea class="form-control" rows="5"  name= "hobby" id="comment">{{$profile->hobby}}</textarea>
		</div>
	    </div>
		 <div class="col-6">
		        <input type="text" class="form-control" value="{{$profile->address}}" name="address">
		        <div class="form-check"><br>
		  <div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="radio" class="form-check-input" value="1" @if($profile->gender === 1 ) checked @endif name="gender">Nam
		  </label>
		</div>

		<div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="radio" class="form-check-input" value="0" @if($profile->gender != 1 ) checked @endif  name="gender">Nữ
		  </label>
		</div>
   </div>
  </div>
</div>
    <button type="submit" class="btn btn-primary mt-3">Sửa</button>  
</div>
@endforeach
</form>
</div>
</body>
</html>