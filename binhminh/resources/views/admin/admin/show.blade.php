
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content">
			<div class="row">
       
				<table class="table table-bordered">
				<thead>
				  <tr>
				    <th>ID</th>      
				    <th>Name</th>
				    <th>Username</th>
				  </tr>
				</thead>
				<tbody>

				    <th>{{ $user->id }}</th>      
				    <th>{{ $user->name }}</th>
				   	<th>{{ $user->username }}</th>
				</tbody>
				</table>
			</div>
		</div>
	</div> 

	</div>
@include('admin.footer')