
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content" style="padding-top: 3em">
			<div class="row">
       
			<h2>Edit Vị trí </h2>

@if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

			
			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\PriceController@update',$id ))) !!}

				<div class="row add-user">
					<div class="col-md-1">
						Tên vị trí 
					</div>
					<div class="col-md-5">
						{!! Form::text('name_field',$vitri_edit->ten_vi_tri,array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
					  Số thứ tự
					</div>
					<div class="col-md-5">
						{!! Form::text('stt',$vitri_edit->stt, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Mô tả
					</div>
					<div class="col-md-5">
						{!! Form::text('mo_ta',$vitri_edit->mo_ta,array('class' => 'form-control')) !!}
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