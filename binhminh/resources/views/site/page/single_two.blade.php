@include('site.head')
         <div class="content_single_2">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-8">
                         <div class="ct_single_post">
                             <div class="box-thongso">
                               @foreach($gioi_thieu as $gt)
                                <?php echo $gt->content; ?>
                               @endforeach
                              </div>
                         </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="siderbar">
                             <div class="cacgoilienquan">
                                 <h3><strong> Các gói camera liên quan </strong></h3>
                             </div>
                             <div class="sidebar_1">
                                 <div class="hover">
                                     <img  class="img-fluid" src="{{ asset('public/images/img_nd_5.jpg')}}" alt="">
                                     <div class="text_sg_cu">
                                         lắp camera cho bãi gửi xe, nhà xưởng
                                     </div>
                                 </div>
                                 <div class="hover">
                                     <img  class="img-fluid" src="{{ asset('public/images/img_nd_1.jpg')}}" alt="">
                                     <div class="text_sg_cu">
                                         lắp camera cho bãi gửi xe, nhà xưởng
                                     </div>
                                 </div>
                                 <div class="hover">
                                     <img  class="img-fluid" src="{{ asset('public/images/img_nd_3.jpg')}}" alt="">
                                     <div class="text_sg_cu">
                                         lắp camera cho bãi gửi xe, nhà xưởng
                                     </div>
                                 </div>
                             </div>
                        </div>
                     </div>
                 </div>
             </div>
         </div>
@include('site.footer')