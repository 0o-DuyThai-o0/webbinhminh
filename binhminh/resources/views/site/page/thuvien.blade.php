@include('site.head')
  <div class="category">
      <div class="container">
         <div class="row">
            <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">  
            <li><a itemprop="url" href="/"><span itemprop="title">Trang chủ /  </span></a></li> <li style="color: white;"> Thư viện</li> 
          </ul>
         </div>
         
      </div>
  </div>
  <div class="content_cat">
     <div class="container">
        <div class="row">
          @foreach($thuvien as $list_bv)
           <div class="col-md-4">
              <div class="cover_cat mb-5">
                  <div class="tt_cat">
                     <a href="{{$list_bv->product_alias}}">{{ $list_bv->name}}</a>
                  </div>
                 <?php echo $list_bv->content; ?>
                  
                   <!--  <div class="xemt float-right">
                       <a href="{{$list_bv->product_alias}}"> Xem thêm  </a>
                    </div> -->
              </div>
           </div>
          @endforeach 
        </div>
     </div>
  </div>
@include('site.footer')
