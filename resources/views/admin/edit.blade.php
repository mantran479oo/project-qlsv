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
 
  <form action="{{route('update',['id'=>$edit_student->id])}}" method="post">
  	@csrf
  	 <div class="col-sm-3 form-group">
            <label for="sel1">Lớp:</label>
            <select class="form-control" name="class" id="sel1">
              @foreach($list_class as $list_class)
              <option value="{{ $list_class->class_code }}" 
              	@if($edit_student->class_code === $list_class->class_code) selected @endif >{{ $list_class->class_name }}</option>
              @endforeach
            </select>
          </div>
    <div class="row">
      <div class="col-6">
        <input type="text" class="form-control" id="email" value="{{$edit_student->name}}" name="username"><br>
        <input type="date" class="form-control" value="{{$edit_student->date}}" name="date"><br>
        <div class="form-group">
		  <label for="comment">Sở thích:</label>
		  <textarea class="form-control" rows="5"  name= "hobby" id="comment">{{$edit_student->hobby}}</textarea>
		</div>
	    </div>
		 <div class="col-6">

		        <input type="text" class="form-control" value="{{$edit_student->address}}" name="address">
		        <div class="form-check"><br>
		  <div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="radio" class="form-check-input" value="1" @if($edit_student->gender === 1) checked @endif name="gender">Nam
		  </label>
		</div>

		<div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="radio" class="form-check-input" value="0" @if($edit_student->gender != 1) checked @endif name="gender">Nữ
		  </label>
		</div>
         @foreach($list_subject as $list_subject)
            <div class="form-group">
             <label for="usr">{{ $list_subject->subject_title}}:</label>
              		<input type="text" value="{{$list_subject->number_point}}"  class="form-control" name="{{ $list_subject->subject_code }}" id="usr">
            </div>
           @endforeach
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Sửa</button>  
</div>
</form>
</div>
</body>
</html>