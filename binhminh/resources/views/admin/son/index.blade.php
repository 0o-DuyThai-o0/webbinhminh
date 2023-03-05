
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
				@if ( !$sons->count() )
				        No user in Website
				@else		        
				<table class="table table-bordered edit-son">
				<thead>
				  <tr>
				    <th>ID</th>      
				    <th>Name</th>

				  </tr>
				</thead>
				<tbody>
				<?php

				if($session_value) {
					echo $session_value;
					?>
					<a href='{{ asset('admin/logout') }}'> logout </a>
				<?php	
				}
				?>
				@foreach( $sons as $son )
					<tr>
						<td> {{ $son->id }}</td>
						<td>  {{ $son->name }} <br/>
						<a class="show-1" href="{{ asset('admin/son') }}/{{ $son->id }}">show
						</a>	
						<a class="show-1" href="{{ asset('admin/son') }}/{{ $son->id }}/edit"> edit
						</a>	
						</td>
						

					</tr>
				@endforeach
				 
				</tbody>
				</table>
				@endif
				<?php 
				$sons->setPath('son');
				echo $sons->render(); ?>
			</div>

		</div>
	</div> 

	</div>
@include('admin.footer')