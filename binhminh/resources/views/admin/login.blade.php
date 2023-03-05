<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{!!  asset('public/css/bootstrap.min.css'); !!}">
	<link rel="stylesheet" href="{!!  asset('public/admin/css/style.css'); !!}">
	<script src="{!!  asset('public/js-s/jquery-1.11.3.min.js'); !!}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container login-son">
	<div class="row">
				{!! Form::open(array('action' => 'Admin\AdminController@login')) !!}
				<div class="row add-user">
					Username
				</div>
				<div class="row add-user">
						{!! Form::text('username', '', array('class' => 'form-control')) !!}
				</div>
				<div class="row add-user">
					Password
				</div>
				<div class="row add-user">
						
						{!! Form::password('password', array('class' => 'form-control'))!!}
				</div>
			
				<div class="row add-user">
						{!! Form::submit('Login',array('class' => 'btn btn-default')) !!}
				</div>
				
				{!! Form::close() !!}
				
				<p style="    margin-top: 15px;
    text-align: right;"><a href="/">Quay lại trang chủ</a></p>
</div>
</body>

</html>