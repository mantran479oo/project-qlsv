<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>
	<div class="container">
	 <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p> 
	  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Họ tên</th>
        <th>Toán</th>
        <th>Lý</th>
         <th>Hóa</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($list_score as $list_score)
      <tr>
        <td>{{ $list_score->name }}</td>
        @foreach($list_score->pointss as $score)
        <td>@if( $score->subject_code === 'THT01' ){{$score->number_point}}@endif
           <div id="demo" class="collapse">
		    <input type="" name="" style="width: 50px;">
		  </div>
        </td>
        @endforeach
        <td>john@example.com
		<div id="demo" class="collapse">
			<input type="" name="" style="width: 50px;"> 
		</div>
        </td>
        <td>john@example.com
		  <div id="demo" class="collapse">
			<input type="" name="" style="width: 50px;"> 
		</div>
        </td>
        @endforeach
      </tr>
      
    </tbody>
  </table>
  <div class="container">
  <h2>Simple Collapsible</h2>
  <p>Click on the button to toggle between showing and hiding content.</p>
  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
  
</div>
</div>
</body>
</html>