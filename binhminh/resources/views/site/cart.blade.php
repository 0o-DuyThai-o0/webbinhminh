@include('site.head')
<div class="container">
    <div class="new-cart" style="margin-top: 30px;">
      <div class="new-cart-title">
            <h4>THÔNG TIN GIỎ HÀNG</h4>
        </div>
        <div class="new-cart-items">
          <div class="nut-gio-hang">
                <a href="/" class="tiep-tuc-mua-hang"> &lt; Tiếp tục mua hàng </a>
            </div>
            <div class="nut-gio-hang" style="float: right;">
                    {!! Form::open(array('class' => 'form_cart_xoa_product1','method' => 'POST','action' => array('Site\SanphamController@post_cart_xoa_all'))) !!}

                    {!! Form::submit('Xóa giỏ hàng',array('class' => 'xoa-gio-hang detele-cart')) !!}
                    {!! Form::close() !!}
                </div>
            <span style="display: none;">
              </span>
               <?php

                $tong_gia =0;
              
                if( isset( $_SESSION['don_hang'] ) ) {
                $product_all = App\Product::all();
                //  echo $_SESSION['don_hang'];
                $tong_gia=0;
                foreach ($product_all as $key => $product){
                $don_hang_aray=json_decode($_SESSION['don_hang'],1);

                foreach ($don_hang_aray as $key_don_hang =>$don_hang) {


                if($product->id == $don_hang['id']) {

                ?>
              <div class="hang-moi">
                <div class="hang-moi-hinh-anh">
                
                  <?php
                        $img_xs=json_decode($product->image_list,1);

                        if(isset($img_xs)==true) {
                        foreach ($img_xs as $img_x) {
                        ?>
                        <a href="#"> <img style="" src="{{$img_x['url']}}" /></a>
                        <?php
                        break;
                        }
                        }

                        ?>
                </div>
                <div class="thong-tin-san-pham">
                  <a href="#" class="ten-sp-hang-hoa mautrang" style="color: black !important;">{{$product->name}}</a>
                  <br>
                  <span class="woocommerce-Price-amount amount">Liên hệ</span>
                  <div class="xoa-sp-khoi-gh">
                       {!! Form::open(array('class' => 'form_cart_xoa_product','method' => 'POST','action' => array('Site\SanphamController@cart_post_huy_product',$product->id ))) !!}

                            {!! Form::submit('Xóa khỏi giỏ hàng',array('class' => 'removed_product btn  btn-danger detele-cart')) !!}
                            {!! Form::close() !!}
                  </div>
                </div>
                <div class="kiem-tra-dat-hang mautrang">
                  <span class="gia-tien-san-pham">
                                Liên hệ
                  <div class="add-cart">
                          {!! Form::open(array('method' => 'POST','action' => array('Site\SanphamController@update_quantity'))) !!}
                                <div class="numbers-row">
                                  <label for="" class="sl_product"> Số lượng:</label>
                                  <input type="hidden" id="produc_id_cart" name="produc_id_cart" value="{{$product->id}}">
                                    <input class="text_number form-control" type="text" name="so_luong" id="so_luong" value="<?php echo $don_hang['so_luong'];?>">
                                    <input type="submit" class="btn btn-block btn-primary update-cart" value="Update">
                                </div>
                          {!! Form::close() !!}
                             
                                        
                                            
                        </div>
                </div>
              </div>
              <?php
              if(isset($product->price) && $product->price > 0 ){
                $tong_gia += $product->price*$don_hang['so_luong'];
              }else {
                $tong_gia += $product->price_old*$don_hang['so_luong'];

              }


                //echo $product->price*$don_hang['so_luong'];


                unset($don_hang_aray[$key_don_hang]);

                }





                }


                }

                }

                ?>
              <div class="tong-gio-hang mau_vang">
              Tổng tiền đơn hàng :
              <strong><span>Liên hệ</span> </strong>
          </div>
        </div>
    </div>
    <?php if(isset($_SESSION['don_hang'] ))
       
     {
      ?>

 {!! Form::open(array('class' => '','id' => 'dangkyf','method' => 'POST','action' => array('Site\SanphamController@post_cart_don_hang',$product->id ))) !!}
    <div class="pd-top-25">
      <div class="row">
        <div class="col-md-4">
          <div class="wd-100_dp-ib pd-bt-20">
            <div class="top-tieu-de">
              Thông tin khách hàng
            </div>
            <div class="user_info-item"><span class="txt2">Họ tên*</span>
                <input type="text" name="user_info[name]" id="buyer_name" value="" required="">
                <label class="error err" generated="true" for="user_info[name]" style="color:red"></label> 
                <input type="hidden" name="user_info[sanpham]" value="{{$product->name}}">
            </div>
            <div class="user_info-item"><span class="txt2">Email*</span>
                <input class="form-cs kt-bd-input-cart" type="email" name="user_info[email]" id="buyer_email" value="" required="">
                 <label class="error err" generated="true" for="email" style="color:red"></label> 
            </div>
            <div class="user_info-item">  <span class="txt2">Số điện thoại*</span>
                <input class="form-cs kt-bd-input-cart" type="number" name="user_info[tel]" id="buyer_mobile" value="" required="">
                 <label class="error err" generated="true" for="phone" style="color:red"></label>

            </div>
                  <div class="item-form d- user_info-item user_province">
                            <span class="txt2">Tỉnh/Thành phố</span>
                            <span class="custom-province " style="width: 70%;">
                      <select name="user_info[province]"  id="buyer_province" onchange="getDistrict(this.value)" required="" class="form-cs kt-bd-input-cart">
                          <option value="0">--Lựa chọn--</option>

                          <option value="hà nội ">Hà nội</option>

                          <option value="Thành phố HCM">TP HCM</option>

                          <option value="Hải Phòng">Hải Phòng</option>

                          <option value="Đà Nẵng">Đà Nẵng</option>

                          <option value="An Giang">An Giang</option>

                          <option value="Bà Rịa - Vũng Tàu">Bà Rịa-Vũng Tàu</option>

                          <option value="Bình Dương">Bình Dương</option>

                          <option value="Bình Phước">Bình Phước</option>

                          <option value="Bình Thuận">Bình Thuận</option>

                          <option value="Bình Định">Bình Định</option>

                          <option value="Bạc liêu">Bạc Liêu</option>

                          <option value="Bắc Giang">Bắc Giang</option>

                          <option value="Bắc kan">Bắc Kạn</option>

                          <option value="Bắc Ninh">Bắc Ninh</option>

                          <option value="Bến Tre">Bến Tre</option>

                          <option value="Cao Bằng">Cao Bằng</option>

                          <option value="Cà Mau">Cà Mau</option>

                          <option value="Cần Thơ">Cần Thơ</option>

                          <option value="Gia Lai">Gia Lai</option>

                          <option value="Hà Giang">Hà Giang</option>

                          <option value="Hà Nam">Hà Nam</option>

                          <option value="Hà Tĩnh">Hà Tĩnh</option>

                          <option value="Hòa Bình">Hòa Bình</option>

                          <option value="Hải Dương">Hải Dương</option>

                          <option value="Hậu Giang">Hậu Giang</option>

                          <option value="Hưng Yên">Hưng Yên</option>

                          <option value="Khánh Hòa">Khánh Hòa</option>

                          <option value="Kiên Giang">Kiên Giang</option>

                          <option value="Kon Tum">Kon Tum</option>

                          <option value="Lai Châu">Lai Châu</option>

                          <option value="Lào Cai">Lào Cai</option>

                          <option value="Lâm Đồng">Lâm Đồng</option>

                          <option value="Lạng Sơn">Lạng Sơn</option>

                          <option value="Long An">Long An</option>

                          <option value="Nam Định">Nam Định</option>

                          <option value="Nghệ An">Nghệ An</option>

                          <option value="Ninh Bình">Ninh Bình</option>

                          <option value="Ninh Thuận">Ninh Thuận</option>

                          <option value="Phú Thọ">Phú Thọ</option>

                          <option value="Phú Yên">Phú Yên</option>

                          <option value="Quảng Bình">Quảng Bình</option>

                          <option value="Quảng Nam">Quảng Nam</option>

                          <option value="Quảng Ngãi">Quảng Ngãi</option>

                          <option value="Quảng Ninh">Quảng Ninh</option>

                          <option value="Quảng Trị">Quảng Trị</option>

                          <option value="Sóc Trăng">Sóc Trăng</option>

                          <option value="Sơn La">Sơn La</option>

                          <option value="Tay Ninh">Tây Ninh</option>

                          <option value="Thanh Hoa">Thanh Hóa</option>

                          <option value="Thái Bình">Thái Bình</option>

                          <option value="Thái Nguyên">Thái Nguyên</option>

                          <option value="Thừa Thiên Huế">Thừa Thiên-Huế</option>

                          <option value="Tiền Giang">Tiền Giang</option>

                          <option value="Trà Vinh">Trà Vinh</option>

                          <option value="Tuyên Quang">Tuyên Quang</option>

                          <option value="Vĩnh Long">Vĩnh Long</option>

                          <option value="Vĩnh phúc">Vĩnh Phúc</option>

                          <option value="Yên Bái">Yên Bái</option>

                          <option value="Đắk Lắk">Đắk Lắk</option>

                          <option value="Đồng Nai">Đồng Nai</option>

                          <option value="Đồng tháp">Đồng Tháp</option>

                          <option value="Điện biên">Điện Biên</option>

                          <option value="Đăk Nông">Đăk Nông</option>
                      </select>
                    </span>
                        </div>
                     <div class="user_info-item"> <span class="txt2">Địa chỉ*</span>
                            <textarea id="buyer_address" name="user_info[address]" required=""></textarea>
                        </div>
                <div class="user_info-item"><span class="txt2" style="">Ghi chú</span>
                            <textarea name="user_info[note]" id="buyer_note" style="height:100px"></textarea>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="wd-100_dp-ib pd-bt-20">
                      <div class="top-tieu-de">
                        Hình thức thanh toán
                      </div>
                      <table class="tbl_pay" style="font-size: 13px;">
                            <tbody>
                            <tr>
                                <td valign="top"><input type="radio" name="pay_method" value="Thanh toán tiền mặt khi nhận hàng (tiền mặt / quẹt thẻ ATM, Visa, Master)" checked=""></td>
                                <td valign="top">
                                    <div><label for="pay_method_2">Thanh toán tiền mặt khi nhận hàng (tiền mặt / quẹt thẻ ATM, Visa, Master)</label></div>
                                    <div style="display:none;">Quý khách hàng có thể thanh toán bằng tiền mặt hoặc quẹt thẻ sau khi nhận được đầy đủ hàng hóa và đáp ứng chất lượng</div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><input type="radio" name="pay_method" value="Thanh toán qua Ngân Hàng (ATM nội địa, Visa, Master)"></td>
                                <td valign="top">
                                    <div><label for="pay_method_4">Thanh toán qua Ngân Hàng (ATM nội địa, Visa, Master)</label></div>
                                    <div style="display:none;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><input type="radio" name="pay_method" value="Thanh toán qua Bảo Kim (ATM nội địa, Visa, Master)"></td>
                                <td valign="top">
                                    <div><label for="pay_method_5">Thanh toán qua Bảo Kim (ATM nội địa, Visa, Master)</label></div>
                                    <div style="display:none;">
                                        Công ty Cổ Phần Máy tính Hà Nội
                                        <br>Đại diện: Nguyễn văn Tiến 
                                        <br>Email tài khoản: dangdinhtrung@vititech.vn
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><input type="radio" name="pay_method" value="Trả góp qua Alepay (Ngân Hàng)"></td>
                                <td valign="top">
                                    <div><label for="pay_method_10">Trả góp qua Alepay (Ngân Hàng)</label></div>
                                    <div style="display:none;"></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lh-17">
                        <table class="tong-so-tien-can-thanh-toan">
                            <tbody>
                            
                            <tr class="fs-16">
                                <td>
                                    <b>Thành tiền</b>
                                </td>
                                <td class="text-right ">
                                    <strong class="cl-red">Liên hệ</strong><br>
                                    <span class="fs-12">(Giá chưa bao gồm VAT)</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <div style="" class="new-cart-button">
                            <a class="button-1 button-100 bg-yellow" href="/san-pham">Chọn thêm sản phẩm</a>

                            {!! Form::submit('Đặt hàng',array('class' => 'button-1 button-100 bg-red')) !!}
                        </div>
                    </div>
        </div>
      </div>
    </div>
     {!! Form::close() !!} 
    <?php } ?>
  </div>
@include('site.footer')
<script type="text/javascript">
     $(document).ready(function() {
        $("#dangkyf").validate({
            rules: {
             user_info[name]: {
                required: true,
             },
             email: {
                required: true,
                email:true
             },

              phone: {
                    required: true,
                    number: true,
                    maxlength: 11,
                    minlength: 8
                },
               
               

            },
            messages: {
                 user_info[name]: {
                     required: "Vui lòng nhập tên",
                 },
                 email: {
                     required: "Vui lòng nhập Email",
                     email: "vui lòng nhập đúng định dạng email"
                 },
                 phone: {
                     required: "Vui lòng nhập số điện thoại",
                     number: "vui lòng nhập kiểu số",
                    minlength: "độ ngắn tối thiểu 8",
                      maxlength: "độ dài tối đa 10"
                },
               
              
            }
        });
    });
</script> 

