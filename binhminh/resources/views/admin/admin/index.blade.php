
@include('admin.head')
	<div id="wrapper"  class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
		
			<div class="row">
			    <h2>Tất cả Admin</h2>
				@if ($errors->has()) 
				<p style="color:red;">
				  @foreach ($errors->all() as $error)
				    {!! $error !!}<br />		
				  @endforeach
				</p>
				@endif
				@if ( !$users->count() )
				        No user in Website
				@else		        
				<table class="table table-bordered edit-son">
				<thead>
				  <tr>
				    <th>ID</th>      
				    <th>Name</th>
				    <th>Username</th>
				    <th>Status</th>
				  </tr>
				</thead>
				<tbody>
				<?php

				if($session_value) {
					echo $session_value;
					?>
					<a href='../admin/logout'> logout </a>
				<?php
				}
				?>
				@foreach( $users as $user )
					<tr>
						<td> {{ $user->id }}</td>
						<td>  {{ $user->name }} <br/>
						<a class="show-1" href="../admin/admin/{{ $user->id }}">show
						</a>	
						<a class="show-1" href="../admin/admin/{{ $user->id }}/edit"> edit
						</a>	
						<!--
							{!! Form::open(array('method' => 'DELETE','action' => array('Admin\AdminController@destroy',$user->id))) !!}
							 	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}	
							-->
						</td>
						<td>  {{ $user->username }}</td>
						<td> 
						{!! Form::open(array('method' => 'PUT','action' => array('Admin\AdminController@update',$user->id,$user->status ))) !!}
						
										<div class="status-{{ $user->status }}" style="width:30px;height:30px;">
										</div>
							{!! Form::submit('Status',array('class' => 'btn btn-default')) !!}

						{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				 
				</tbody>
				</table>
				@endif
				<?php 
				$users->setPath('admin');
				echo $users->render(); ?>
			</div>

		</div>
	</div> 

	</div>
@include('admin.footer')