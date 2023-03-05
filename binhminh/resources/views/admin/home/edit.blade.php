
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content" style="padding-top: 3em">
			<div class="row">
       
			<h2>Edit Home Field</h2>



				
			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\HomeController@update',$id ))) !!}
                <div class="row add-user">
	                <div class="col-md-1">
	                    Tên định dạng 
	                </div>
	                <div class="col-md-11">
	                   <select name="ten_dinh_dang" id="" class="form-control">
	                       <option value=""> Chọn định dạng </option>
	                    @foreach($ten_dinh_dang as $dd)
	                       <option value="<?=$dd->id;?>" <?php if($dd->id == $home_edit->id_dinhdang){ echo "selected";} ?>><?php echo $dd->ten_dinh_dang;?></option>
	                    @endforeach   
	                   </select>
	                </div>
	            </div>
	          <div class="row add-user">
                <div class="col-md-1">
                    Tên vị trí
                </div>
                <div class="col-md-11">
                    <select name="ten_vi_tri" id="" class="form-control">
                           <option value="<?=$home_edit->id_vitri;?>"><?=$home_edit->id_vitri;?></option>

                    </select>
                </div>
            </div>
				<div class="row add-user">
					<div class="col-md-1">
						Mô tả
					</div>
					<div class="col-md-11">
						{!! Form::text('mo_ta',$home_edit->mo_ta,array('class' => 'form-control')) !!}
					</div> 
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Nội dung trường
					</div>
					<div class="col-md-11">
					        <textarea id="content" name="content"> {{$home_edit->content}} </textarea>
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