
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content" style="margin-top: 5%;">
			<div class="row">
       
			<h2>Edit User Admin</h2>


            <?php 
            //echo  Form::model($user,[ 'method' => 'PATCH', 'action' => ['Admin\AdminController@update',$user->id]] );
            ?>

			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\AdminController@update',$id ))) !!}

				<div class="row add-user">
					<div class="col-md-1">
						Name
					</div>
					<div class="col-md-5">
						{!! Form::text('name',$user->name,array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Username
					</div>
					<div class="col-md-5">
						{!! Form::text('username',$user->username, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Password
					</div>
					<div class="col-md-5">
						{!! Form::text('password', '', array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Stutus
					</div>
					<div class="col-md-5">
					<select class="form-control" name="status">
				        <option value="1" 
				        @if ($user->status )
				        selected 
						@endif
						>Published
				        </option>
				         <option value="0"
				            @if (!$user->status )
							selected 
							@endif
							>
				         Unpublished</option>
				      </select>

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