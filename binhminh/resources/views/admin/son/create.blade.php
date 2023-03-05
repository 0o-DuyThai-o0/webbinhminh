
@include('admin.head')
	<div id="wrapper"  class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper"  class="col-md-9 admin-content">
			<h2>Tạo Admin mới</h2>
				{!! Form::open(array('action' => 'Admin\SonController@store')) !!}
				<div class="row add-user">
					<div class="col-md-1">
						name
					</div>
					<div class="col-md-11">
						{!! Form::text('name', '', array('class' => 'form-control')) !!}
					</div>
				</div>

				
				<div class="row add-user">
					<div class="col-md-1">
						
					</div>
					<div class="col-md-10">
						{!! Form::submit('Create',array('class' => 'btn btn-default')) !!}
					</div>
				</div>
				
				{!! Form::close() !!}
			

		</div>
		
	</div> 

	</div>
@include('admin.footer')