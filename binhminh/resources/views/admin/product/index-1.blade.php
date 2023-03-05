
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content">
			<div class="row">
			    <h2>All Product</h2>
				@if ($errors->has())
				<p style="color:red;">
				  @foreach ($errors->all() as $error)
				    {!! $error !!}<br />		
				  @endforeach
				</p>
				@endif
				@if ( !$products->count() )
				        No Product in Website
				@else		        
				<table class="table table-bordered edit-son">
				<thead>
				  <tr>
				    <th>ID</th>      
				    <th>Name</th>
				     <th>Price</th>
				    <th>Alias</th>
				    

				    <th>Nội dung</th>
				    <th> Category</th>
					<th>Admin</th>
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
				@foreach( $products as $product )
					<tr>
						<td> {{ $product->id }}</td>
						<td>  {{ $product->name }} <br/>
						<a target="_blank" class="show-1" href="{{ asset('')  }}{{ $product->product_alias }}">view
						</a>							
						<a class="show-1" href="{{ asset('admin/product') }}/{{ $product->id }}">show
						</a>	
						<a class="show-1" href="{{ asset('admin/product') }}/{{ $product->id }}/edit"> edit
						</a>	
							{!! Form::open(array('method' => 'DELETE','action' => array('Admin\ProductController@destroy',$product->id))) !!}
							 	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}	
						</td>
						<td>  {{ $product->price }}</td>
						<td>  {{ $product->product_alias }}</td>
						
						<td>  {{ $product->content }}</td>
						<td> 
							<?php
								if(App\Cat::find($product->cat_id) ){
								//		echo App\Cat::find($product->cat_id)->name;
									//	echo App\Product::find($product->id)->cat;
									echo $cat =App\Product::find($product->id)->cat->name;
								//echo var_dump($cat);				
								}
							?>
						</td>
						<td>  {{ $product->admin_id }}

							<?php
							if(App\Admin::find($product->admin_id) ){
								echo App\Admin::find($product->admin_id)->name;
							}
						?>
						</td>

					</tr>
				@endforeach
				 
				</tbody>
				</table>
				@endif
				<?php 
				$products->setPath('product');
				echo $products->render(); ?>
			
			</div>

		</div>
	</div> 

	</div>
@include('admin.footer')