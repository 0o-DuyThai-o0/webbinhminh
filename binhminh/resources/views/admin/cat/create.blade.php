
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content">
			<h2>Add Category</h2>
				{!! Form::open(array('action' => 'Admin\CatController@store')) !!}
				<div class="row add-user">
					<div class="col-md-1">
						Name
					</div>
					<div class="col-md-5">
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Alias
					</div>
					<div class="col-md-5">
						{!! Form::text('cat_alias', '', array('class' => 'form-control')) !!}
					</div>
				</div>

				<div class="row add-user">
					<div class="col-md-1">
						Parent
					</div>
					<div class="col-md-5">
					<select class="form-control" name="parent_id">
						<?php
							view_category( $cat_parents,$cats,-1);
						?>
					<!--
						@foreach( $cat_parents as $cat_parent )

							@foreach( $cats as $cat )
								@if($cat_parent->id==$cat->id)
							         <option style="font-size:18px;" value="{{ $cat->id }}">  
											{{  $cat->name }} 
							         </option>
								@endif 
								@if( $cat_parent->id==$cat->parent_id )
							         <option class="s-child" value="{{ $cat->id }}">  
											&nbsp;&nbsp;&nbsp;-{{  $cat->name }} 
							         </option>

								@endif

							@endforeach
						@endforeach
						-->
				        <option value="0" selected>Không thuộc danh mục nào
				        </option>

				      </select>
					</div>
				</div>					
				<div class="row add-user">
					<div class="col-md-1">
						
					</div>
					<div class="col-md-10">
						{!! Form::submit('Create',array('class' => 'btn btn-default')) !!}
					</div>
				</div>
				
				{!! Form::close() !!}
			

		</div>
		
	</div> 

	</div>
@include('admin.footer')