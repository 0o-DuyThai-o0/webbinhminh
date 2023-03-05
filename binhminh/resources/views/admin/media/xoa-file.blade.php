
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content">
			<div class="row">
				{!! Form::open(array('method' => 'POST','action' => array('Admin\MediaController@delete_image',1))) !!}

				{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

				{!! Form::close() !!}
			</div>

		</div>
	</div> 

	</div>
@include('admin.footer')