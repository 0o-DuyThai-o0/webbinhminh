@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content admin-media">
			<div class="row">
			    <h2>All images</h2>
				@if ($errors->has())
				<p style="color:red;">
				  @foreach ($errors->all() as $error)
				    {!! $error !!}<br />		
				  @endforeach
				</p>
				@endif
				<table>

				@foreach( $muc_con as $muc_con_1 )

					<div class="folder-media">
	        			<a href="{{ $muc_con_1 }}"> <img src="{{ url() }}/public/admin/images/folder-images-icon.png" /></a>
	        			<?php 
	        				$url_upload=base_path().'/uploads';
	        			//	echo $url_upload ."<br/>";
	        				$url_upload_1 =str_replace( $url_upload, '', (string)$muc_con_1 );
						//	echo $url_upload_1=chop($url_upload_1,'&nbsp');
							$url_upload_1= preg_replace('/[^A-Za-z0-9\- ]/', '/',(string)$url_upload_1);

							$ttt=trim((string)$url_upload_1);
							$ttt=explode('/',$url_upload_1);
							$ttt=explode('/',chop($url_upload_1));

							$key = array_search('',$ttt);

							unset($ttt[$key]);//xóa ký tự tìm thấy

							$ttt=array_values($ttt); //sắp xếp lại 0,1,2,3...

							 $dem= count($ttt);
						//	array_splice($ttt,0,1);
						//	print_r($ttt);
						//	var_dump($ttt);
							//echo $ttt[0]; 

							//exit();
							if($dem==1)
							{
								$name_folder=$ttt[0];
								$name_folder1='';
								$name_folder2='';
								$name_folder_tong= $name_folder;
							}
							else if($dem==2)
							{
								$name_folder=$ttt[0];
								$name_folder1=$ttt[1];
								$name_folder2='';
								echo $name_folder_tong= $name_folder.'/'.$name_folder1;
								//exit();
							}else if($dem==3) {

								$name_folder=$ttt[0];
								$name_folder1=$ttt[1];
								$name_folder2=$ttt[2];
								$name_folder_tong= $name_folder.'/'.$name_folder1.'/'.$name_folder2;
								// exit();

							}

							//echo $ttt[2];
					//		var_dump($url_upload_1=explode('/',$url_upload_1) );

					//		echo $url_upload_1[1];
							$name_folder=str_replace( $url_folder, '', (string)$muc_con_1 );
							//echo $name_folder.$name_folder1.$name_folder2;


							$name_folder= preg_replace('/[^A-Za-z0-9\- ]/', '', $name_folder);

	        			?>
	        			<p><a href="#">{{  $name_folder }}</a>  <p>

	        			{!! Form::open(array('method' => 'POST','action' => array('Admin\MediaController@view_folder',$name_folder_tong ))) !!}
						  <input name="name_folder" type="hidden" value="{{ $muc_con_1 }}" />
							{!! Form::submit('Go',array('class' => 'btn btn-default')) !!}
						{!! Form::close() !!}
	        			
		        	</div>
				@endforeach
				<?php
				$page = (isset($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;
				$page_size=10;
				$items=	phan_trang_array($all_file,$page_size,base_path(),$url_folder,$page);
				$page_count = ceil(count($all_file)/$page_size);
				foreach ($items as $key => $val)
					{


					$str = str_replace( base_path(), '', (string)$val);
					$name=str_replace( $url_folder.'/', '', (string)$val );

					?>
					<!--
						<div class="img-media">
		        			<img src="<?php echo url().$str ?> " />							
			        	</div> -->
			        <div class="img-media">
        			<img src="{{ url() }}{{ $str }}" />
						{!! Form::open(array('method' => 'POST','action' => array('Admin\MediaController@delete_image',$name ))) !!}
						  <input name="name_image" type="hidden" value="{{ $val }}" />
							{!! Form::submit('Delete',array('class' => 'btn btn-default')) !!}
							
						{!! Form::close() !!}
	        	</div>
			        	<?php
					}

				?>
								<ul class="pagination media_pagination">
				 <?php
				for ($i = 1; $i <= $page_count; $i++)
				{
					echo "<li> <span><a href=\"?page={$i}\">{$i}</a></span> </li>";
				}
				echo "</ul>";
				?>

				@foreach( $all_file as $all_file_1 )
					<?php
					//	echo url();
					//echo $all_file_1;
					//var_dump($all_file_1);
					
					//	$str = str_replace( base_path(), '', (string)$all_file_1 );
					//	$name=str_replace( $url_folder.'/', '', (string)$all_file_1 );
					//	echo $name.'<br>';
						//echo $str;
					?>


				@endforeach
				</table>
			</div>

				<?php 
			//	$all_file->setPath('media');
			//	echo $all_file->render();


			 ?>
		</div>
	</div> 

	</div>
@include('admin.footer')