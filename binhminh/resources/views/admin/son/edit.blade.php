
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content">
			<div class="row">
       
			<h2>Edit Son</h2>


			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\SonController@update',$id ))) !!}

				<div class="row add-user">
					<div class="col-md-1">
						Name
					</div>
					<div class="col-md-5">
						{!! Form::text('name',$son->name,array('class' => 'form-control')) !!}
					</div>
				</div>

			
				<div class="row add-user">
					<div class="col-md-1">
						
					</div>
					<div class="col-md-10">
						{!! Form::submit('Update',array('class' => 'btn btn-default')) !!}
					</div>
				</div>
				
				{!! Form::close() !!}

			</div>
		</div>
	</div> 

	</div>
@include('admin.footer')