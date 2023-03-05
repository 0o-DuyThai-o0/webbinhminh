 @include('admin.head')

	<div class="container">
		Trang create admin
	</div>
	{!! Form::open(array('action' => 'UserController@store')) !!}
	{!! Form::text('title', @$title) !!}
	{!! Form::text('alias', @$alias) !!}
	{!! Form::submit('Send') !!}
	{!! Form::close() !!}
@include('admin.footer')





