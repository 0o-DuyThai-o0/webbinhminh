
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content" style="padding-top: 3em">
			<div class="row">
       
			<h2>Edit Định dạng Field</h2>

			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\SizeController@update',$id ))) !!}

				<div class="row add-user">
					<div class="col-md-1">
						Name Định dạng 
					</div>
					<div class="col-md-5">
						{!! Form::text('ten_dinh_dang',$dinh_dang->ten_dinh_dang,array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Mô tả 
					</div>
					<div class="col-md-5">
						{!! Form::text('mo_ta',$dinh_dang->mo_ta,array('class' => 'form-control')) !!}
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
