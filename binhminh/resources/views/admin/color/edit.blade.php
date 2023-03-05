
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content" style="padding-top: 3em">
			<div class="row">
       
			<h2>Edit Color Product </h2>



			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\ColorController@update',$id ))) !!}

				<div class="row add-user">
					<div class="col-md-1">
						Name
					</div>
					<div class="col-md-5">
						{!! Form::text('ma_mau',$color_edit->ma_mau,array('class' => 'form-control')) !!}
					</div>
					<div class="col-md-1">
						 <div style="width: 35px;height: 35px;background:<?= $color_edit->ma_mau;?>"></div>
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