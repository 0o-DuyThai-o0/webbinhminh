@include('site.head')
@foreach( $products as $product )


{{ $product->name }}

@endforeach
<?php
echo "bong dá số";
//var_dump($products->name);

?>
<div>
	
</div>
@include('site.footer')