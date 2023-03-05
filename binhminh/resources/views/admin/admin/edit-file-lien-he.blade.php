
@include('admin.head')
	<div id="wrapper"  class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<div class="row">
       
			<h2>Chỉnh sửa phần Footer</h2>


			{!! Form::open(array('method' => 'POST','action' => array('Admin\AdminController@edit_file_index_lienhe'))) !!}



				<div class="row add-user">
					<div class="col-md-1">
						Nội dung
					</div>
					<div class="col-md-11">
					        <textarea id="content" name="content">
							{{ $footer_file }}
							</textarea>
						<script>CKEDITOR.replace('content');</script>
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