@include('site.head')
	<div class="container content_son_index site-site">
	<div class="row">
		<div class="col-sm-3 site-bar-s">
			
		</div>
		<div class="col-sm-12 padding-right show_sanpham_son">
			<div class="features_items">
						@if ($errors->has())
							<p style="color:red;">
							  @foreach ($errors->all() as $error)
								{!! $error !!}<br />		
							  @endforeach
							</p>
						@endif
						<h2 class="title text-center"><b>{{$title}}  </b></h2>

						@foreach( $products as $product )
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
							<?php
							$img_xs=json_decode($product->image_list,1);
							if(count($img_xs)){
								if(isset($img_xs)) {
									foreach ($img_xs as $img_x) {
									?>
									<table>	
										<td>
											<img src="{{$img_x['url']}}" />
										</td>
									</table>
										<?php
										break;
									}
								}
								}else {
									?>
									<img src="/public/images/home/product3.jpg" alt="" />
									<?php
								}
						?>
										<!--
										<h2>{{ $product->price }}</h2>
										-->
										<p>
	
										{{ $product->name }}

										</p>
										<a href="#"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
										<?php 
											if($product->ma_san_pham) echo $product->ma_san_pham;
											else echo "Liên hệ";
										?>
										</a>
									</div>
									<a class="show-1" title="{{ $product->name }}" href="{{ asset('') }}{{ $product->product_alias }}">	
									<div class="product-overlay">
										<div class="overlay-content">
										<p>Vui lòng liên hệ để được<br> giá tốt nhất</p>
											<div class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Liên hệ</div>

										</div>
									</div> 
									</a>
								</div>
							</div>	
						</div>
						
						@endforeach
						<div class="row" style="    clear: both;">
				<?php 
				//$products->setPath('pha-thai');
				echo $products->render(); 
				?>
				</div>
			</div><!--features_items-->
		</div>

	</div> 

	</div>
@include('site.footer')