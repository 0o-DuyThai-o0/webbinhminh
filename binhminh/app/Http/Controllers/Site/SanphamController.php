<?php namespace App\Http\Controllers\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use View;
use Session;
use App\comment;
use App\reply_comment;
use App\tintuc;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SanphamController extends Controller {
    public function form__input_search (Request $request) {
        $form__input_search = $request -> input('form__input_search');
        $products=DB::table('product')->where('name', 'LIKE', "%$form__input_search%")->orderBy('id', 'DESC')->paginate(count_phan_trang);
        
        
        return redirect()->action('Site\SanphamController@get_form__input_search', $form__input_search);
    }
    
    public function get_form__input_search ($form__input_search) {
        $cats = App\Cat::all();
        $cat_name = App\Cat::all();
        $product_all = DB::table('product')->where('status_product','=','1')->get();
        $products=DB::table('product')->where('name', 'LIKE', "%$form__input_search%")->orderBy('id', 'DESC')->paginate(12);
        
        
        $count_product = count($products);
    
        return view('site.fill_product') -> with('products', $products) -> with('cats', $cats) -> with('cat_name', $cat_name) -> with('product_all', $product_all)
         -> with('form__input_search', $form__input_search) -> with('count_product', $count_product);
    }

    public function comment_post($id){

        $ids=App\product::all();
        $cmid=App\product::find($id);
        $comment_all = DB::table('comment')->where('id', 'LIKE', "%-".$id."-%")->post();
        //exit("vao toi ham get_search_site");
        $comments=DB::table('comment')->where('id', 'LIKE', "%-".$id."-%")->paginate(9);
        $count_comment_cat = count($comments);
   
        return view('site.comment')->with('comment_all',$comment_all)->with('count_comment_cat',$count_comment_cat)->with('comments',$comments)->with('cmid',$cmid);

    }

public function index()
{ 

    $trang_chu=DB::table('product')->where('id', '=', "856")->where('status_product','=',1 )->get();

    $bai_viet_quan_trong=DB::table('product')->where('cat_id', 'LIKE', "%-572-%")->where('status_product','=',1 )->take(20)->orderBy('id','DESC')->get();

    $bat_ca_shbet=DB::table('product')->where('cat_id', 'LIKE', "%-582-%")->where('status_product','=',1 )->take(20)->get();
	
    $jotun=DB::table('product')->where('cat_id', 'LIKE', "%-563-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
	
    $sika = DB::table('product')->where('cat_id', 'LIKE', "%-564-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();

    $sp_noi_bat = DB::table('product')->where('cat_id', 'LIKE', "%-567-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
	
    $gach_xd = DB::table('product')->where('cat_id', 'LIKE', "%-527-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
    $cat_xd = DB::table('product')->where('cat_id', 'LIKE', "%-535-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
    $da_xd = DB::table('product')->where('cat_id', 'LIKE', "%-552-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
    $ton_ma_mau = DB::table('product')->where('cat_id', 'LIKE', "%-545-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
    $xi_mang = DB::table('product')->where('cat_id', 'LIKE', "%-536-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
    
    $tran_nhua = DB::table('product')->where('cat_id', 'LIKE', "%-539-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
    $tran_xuyen_sang = DB::table('product')->where('cat_id', 'LIKE', "%-553-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
	
	
    $nhom_kinh = DB::table('product')->where('cat_id', 'LIKE', "%-554-%")->where('status_product','=',1 )->take(3)->orderBy(DB::raw('RAND()'))->get();
	

    return view('site.index')->with('bai_viet_quan_trong',$bai_viet_quan_trong)->with('jotun',$jotun)->with('bat_ca_shbet',$bat_ca_shbet)->with('sika',$sika)->with('sp_noi_bat',$sp_noi_bat)->with('gach_xd',$gach_xd)->with('cat_xd',$cat_xd)->with('da_xd',$da_xd)->with('ton_ma_mau',$ton_ma_mau)->with('xi_mang',$xi_mang)->with('tran_nhua',$tran_nhua)->with("tran_xuyen_sang",$tran_xuyen_sang)->with('nhom_kinh',$nhom_kinh)->with('trang_chu',$trang_chu);
}

                
/************ controller orrderby in cat **************/
public function orderby_cat_get(Request $request,$cat_alias_loc,$cat_id){
    
	$id_loc = $request->input('orderby');
    return redirect()->action('Site\SanphamController@orderby_cat',[$cat_alias_loc,$cat_id,$id_loc]);
}
public function orderby_cat($cat_alias_loc,$cat_id,$id_loc){
    $cats=App\Cat::all();

    switch($id_loc) {
        case 'b':
       
           $products=DB::table('product')->orderBy('price', 'ASC')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->paginate(9);
            break;
        case 'c':
           $products=DB::table('product')->orderBy('price', 'DESC')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->paginate(9);
            break;
        case 'd':
           $products=DB::table('product')->orderBy('id', 'DESC')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->paginate(9);
            break;
        case 'e':
           $products=DB::table('product')->orderBy('id', 'ASC')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->paginate(9);
            break; 
        case 'a';
           $products=DB::table('product')->paginate(12);
           break;                       


           
    }

    $product_all = count($products);
       $min_price_old = DB::table('product')->selectRaw('min(price_old) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->where('status_product','=','1')->first();
        $max_price_old = DB::table('product')->selectRaw('max(price_old) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->where('status_product','=','1')->first();
        $min_price_new = DB::table('product')->selectRaw('min(price) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->where('status_product','=','1')->first();
        $max_price_new = DB::table('product')->selectRaw('max(price) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->where('status_product','=','1')->first();

    return view('site.search')->with('products',$products)->with('cat',$cats)->with('cat_alias_loc',$cat_alias_loc)->with('cat_id',$cat_id)->with('min_price_old',$min_price_old)->with('max_price_old',$max_price_old)->with('min_price_new',$min_price_new)->with('max_price_new',$max_price_new)->with('id_loc',$id_loc)->with('all_product',$product_all);

   
}

/*************** mail contact us **********************/
public function singup() {
    include(base_path().'/gui-mail/class.smtp.php');
    include(base_path().'/gui-mail/class.phpmailer.php');
    include(base_path().'/gui-mail/functions.php');
    $name = $_POST['name'];
    if($_POST['name']){
    $title = 'Đăng ký';
    $nTo = 'MuaChung';
    $mTo = 'okiafashion6@gmail.com';
    $diachi = 'okiafashion6@gmail.com'; 
    
    
                            $content = "Họ tên: ".$name."<br/>";
                
                
                            $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                            if($mail==1){
                                   return view('site.thanhcong');

                            }
                            else{
                             
                             }
    }
    
}
/************ controller price select *****************/
public function price_select(Request $request){
     $price_vnd=$request->input('currencies');
     $_SESSION['price'] = $price_vnd;
     return redirect()->back();
}

    public function get_session_don_hang(Request $request){

        echo "đây là đơn hàng";

    }
    public function post_session_don_hang(Request $request){

        $produc_id_cart=$request->input('produc_id_cart');
       
        $so_luong=$request->input('so_luong');
        $product_size = $request->input('size_single');
        $product_color = $request->input('color_single');

        $don_hang_new='[{"id": "'.$produc_id_cart.'","so_luong": "'.$so_luong.'","status": "1","size": "'.$product_size.'","color": "'.$product_color.'"}]';
      
        
        // $thuoctinh = json_decode($_SESSION['att_product']);
        // foreach ($thuoctinh as $hehe => $value) {
        //    if($value->id == $produc_id_cart) {
        //        unset($_SESSION['att_product']);
        //        $_SESSION['att_product'] = $att_product;
        //    }else {
        //      $_SESSION['att_product'] = $att_product;
        //    }
        // }

        //echo "<meta http-equiv='content-type' content='text/html;charset=utf-8' />";

        if( isset( $_SESSION['don_hang'] ) ) {
           


            //unset($_SESSION['don_hang']);
            if ($produc_id_cart > 0) {

                $don_hang_aray=json_decode($_SESSION['don_hang'],1);

                //	var_dump($don_hang_aray);

                $ton_tai_id =0;

                foreach ($don_hang_aray as $key =>$don_hang) {


                    if($don_hang['id'] == $produc_id_cart) {
                        $ton_tai_id =1;

                        $so_luong=$don_hang['so_luong'] + $so_luong; // nếu sản phẩm thêm có rồi, thì công sô luong vô
                        $don_hang_new='[{"id": "'.$produc_id_cart.'","so_luong": "'.$so_luong.'","status": "1"}]'; // them sô luong roi`
                        unset($don_hang_aray[$key]); //xoa' phan tu mang
                        $_SESSION['don_hang'] =json_encode(array_merge($don_hang_aray,json_decode($don_hang_new,1)));
                        //echo $don_hang_new;
                        //	exit();
                        break;
                    }

                }
                if($ton_tai_id == 0) {
                    $_SESSION['don_hang'] =json_encode(array_merge($don_hang_aray,json_decode($don_hang_new,1))); // nếu id product khác nhau, thì add sản phẩm vào cuối mảng
                  $product_att = json_decode($_SESSION['don_hang']);
                 
                

                }

                

            }

        }else {
            $_SESSION['don_hang']=$don_hang_new;
        }

        if( isset( $_SESSION['don_hang'] ) ) {
            $products = App\Product::all();
            foreach ($products as $key => $product){
                $don_hang_aray=json_decode($_SESSION['don_hang'],1);

                foreach ($don_hang_aray as $key_don_hang =>$don_hang) {

                    if($product->id == $don_hang['id']) {

                        //	 echo "<li>".$product->name."</li>";
                        unset($don_hang_aray[$key_don_hang]);
                    }



                }


            }

        }
    

        Session::flash('message1', 'Sản phẩm của bạn đã được thêm vào giỏ hàng, Bạn có thể xem lại giỏ hàng của bạn');
       //$product_all = DB::table('product')->where('status_product','=','1')->get();
    return redirect('cart');
       

    }

// xử lý phần add new ảnh product 
        public function them_anh_ajax_tt(Request $request){
        
       

                   




                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_product'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');

                                break;
                            }


                        }

                     }
                 
                    

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_product'.$i;
                                   

                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_create_product" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="add_images_create_product_thang" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_product'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_product'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_create_product" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="add_images_create_product_thang" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}





public function them_anh_ajax_tt_slider(Request $request){
        
       

                   




                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_product_slider'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');

                                break;
                            }


                        }

                     }
                 
                    

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_product_slider'.$i;
                                   

                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_create_product_slider" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="add_images_create_product_slider" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_slider(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_product_slider'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_product_slider'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_create_product_slider" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="add_images_create_product" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}
public function them_anh_ajax_tt_edit_product(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_edit_product'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_edit_product'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_edit_product" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }

                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="add_images_edit_product" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_edit_product(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_edit_product'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_edit_product'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_edit_product" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="add_images_edit_product" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}
public function them_anh_ajax_tt_edit_product_slider(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_edit_product_slider'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_edit_product_slider'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_edit_product_slider" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="edit_product_slider" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_edit_product_slider(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_edit_product_slider'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_edit_product_slider'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_edit_product_slider" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="edit_product_slider" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}

public function them_anh_ajax_tt_cat_create(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_cat'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_cat'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_create_cat" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="add_images_create_cat" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_cat_create(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_cat'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_cat'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_create_cat" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="add_images_create_cat" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}
public function them_anh_ajax_tt_cat_create_danh_muc(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_cat_danhmuc'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_cat_danhmuc'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_create_cat_danhmuc" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="add_images_create_cat_danhmuc" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_cat_create_danh_muc(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_cat_danhmuc'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_cat_danhmuc'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_create_cat_danhmuc" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="add_images_create_cat_danhmuc" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}


public function them_anh_ajax_tt_cat_edit_avt(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_edit_category_avatar_cat'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_edit_category_avatar_cat'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_edit_cat_avatar" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="image_cat_edit_avatar" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_cat_edit_avt(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_edit_category_avatar_cat'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_edit_category_avatar_cat'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_edit_cat_avatar" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="image_cat_edit_avatar" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}
public function them_anh_ajax_tt_cat_edit_banner(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_edit_category_banner_cat'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_edit_category_banner_cat'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_edit_cat_banner" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="image_cat_edit_banner" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_post_tt_cat_edit_banner(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_edit_category_banner_cat'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_edit_category_banner_cat'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_edit_cat_banner" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="image_cat_edit_banner" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}



public function them_anh_ajax_tt_news(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_create_news'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_create_news'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_create_news" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="add_images_create_news" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_news(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_create_news'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_create_news'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_create_news" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="add_images_create_news" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}
public function them_anh_ajax_tt_news_edit(Request $request){
        
       



                     if($request->get('query')) {
                      $key_timkiem= $request->get('query');
                      $json_img_2='';
                     
                        for($i=0;$i<20;$i++){
                            
                            $s='image_edit_news'.$i;
                            
                            if(!isset($_SESSION[$s])) {
                                              
                                 $_SESSION[$s] = $request->get('query');
                                

                                break;
                            }


                        }

                     }
                 
                   

                    $anh_json ="";
                    for($i=0;$i<20;$i++){
                        

                        $s='image_edit_news'.$i;


                        if(isset($_SESSION[$s])) {
                                      //echo $s='image_create_0'.$i;
                                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            ?>

                          <div class="img_x">
                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                            <input class="btn btn-default xoa_anh_edit_news" type="button" value="x">
                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                      

                          </div>
                          
                            <?php
                            
                        }
                       
                    }
                    ?>
         
         
                     <input id="json_string_z_thang" name="image_news_avt" type="hidden" value='<?php echo $anh_json;?>'>
         
                    <?php
                
                    
                    
                    
              //session_destroy(); 


}



public function xoa_anh_ajax_news_edit(Request $request) {
    
    
                     if($request->get('query')>=0) {
                   
                    $key_timkiem= $request->get('query');

                    
                    for($i=0;$i<20;$i++){
                        $s='image_edit_news'.$i;
                        if(!isset($_SESSION[$i]) && $key_timkiem==$i) {
                        
                             $_SESSION[$s] = $request->get('query');
                            //echo $_SESSION[$s];
                            unset($_SESSION[$s]);
                            

                        //  break;
                        }

                    }


                 }
                          $anh_json ="";        
                     for($i=0;$i<20;$i++){
                        $s='image_edit_news'.$i;
                        if(isset($_SESSION[$s])) {
                            if($anh_json=='')
                                            {

                                                $anh_json= '{"url":"'.$_SESSION[$s].'"}';

                                            }else {
                                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    
                                            }
                            
                            ?>
                  <div class="img_x">
                     <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
                    <input class="btn btn-default xoa_anh_edit_news" type="button" value="x">
                     <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                  </div>
                  <?php
                     }
                     }
                     
                     
                 ?>
                 <input id="json_string_z_thang" name="image_news_avt" type="hidden" value='<?php echo $anh_json;?>'>
                 <?php  

    
    //echo $id_anh;
    //return redirect()->action('Site\SanphamController@xoa_anh_ajax_get',$id_anh); 

}

 public function update_quantity(Request $request){
        $produc_id_cart=$request->input('produc_id_cart');
        $so_luong=$request->input('so_luong');
         $product_size = $request->input('size_single');
        $product_color = $request->input('size_single');
       $don_hang_new='[{"id": "'.$produc_id_cart.'","so_luong": "'.$so_luong.'","status": "1","size": "'.$product_size.'","color": "'.$product_color.'"}]';

        if( isset( $_SESSION['don_hang'] ) ) {
            //unset($_SESSION['don_hang']);
            if ($produc_id_cart > 0) {

                $don_hang_aray=json_decode($_SESSION['don_hang'],1);
                $ton_tai_id =0;

                foreach ($don_hang_aray as $key =>$don_hang) {


                    if($don_hang['id'] == $produc_id_cart) {
                        $ton_tai_id =1;

                       // $so_luong=$don_hang['so_luong'];// nếu sản phẩm thêm có rồi, thì công sô luong vô
                      $don_hang_new='[{"id": "'.$produc_id_cart.'","so_luong": "'.$so_luong.'","status": "1","size": "'.$product_size.'","color": "'.$product_color.'"}]';

                        unset($don_hang_aray[$key]); //xoa' phan tu mang
                        $_SESSION['don_hang'] =json_encode(array_merge($don_hang_aray,json_decode($don_hang_new,1)));
                        //echo $don_hang_new;
                        //  exit();
                        break;
                    }

                }
                if($ton_tai_id == 0) {
                    $_SESSION['don_hang'] =json_encode(array_merge($don_hang_aray,json_decode($don_hang_new,1))); // nếu id product khác nhau, thì add sản phẩm vào cuối mảng

                }

                //var_dump($_SESSION['don_hang']);

            }

        }

        Session::flash('message1', 'Bạn đã cập nhật thành công giỏ hàng');
        return redirect()->back();

 }

    public function cart_show_product(){

        $product_all = DB::table('product')->where('status_product','=','1')->get();
        return view('site.cart')->with('product_all',$product_all);
    }

    public function cart_huy_product($id) {
        echo $id;

        if( isset( $_SESSION['don_hang'] ) ) {
            if ($id > 0) {

                $don_hang_aray=json_decode($_SESSION['don_hang'],1);

                var_dump ($don_hang_aray);
                foreach ($don_hang_aray as $key =>$don_hang) {


                    if($don_hang['id'] == $id) {
                        $ton_tai_id =1;

                        unset($don_hang_aray[$key]); //xoa' phan tu mang

                        $_SESSION['don_hang'] =json_encode($don_hang_aray,1);

                        break;
                    }

                }
            }

        }
        return redirect()->back();
    }
    public function cart_post_huy_product($id) {

        //echo $id;
        return redirect()->action('Site\SanphamController@cart_huy_product', $id);
    }



    public function get_cart_xoa_all() {






    }
    public function post_cart_xoa_all() {
     unset($_SESSION['don_hang']);
        return redirect()->back();
//return redirect()->action('Site\SanphamController@cart_huy_product', $id);


    }
public function get_cart_don_hang(Request $request){
    
    echo "đây là đơn hàng";
    
}


// public function search_site(Request $request){
	
// 	$search_site = $request->input('search_site');

// 	$nha_mang = $request->input('nha_mang');
// 	if(isset($nha_mang)) {
// 	$nha_mang = $request->input('nha_mang');
// 	$khoang_gia = $request->input('khoang_gia');
// 	$sap_xep = $request->input('sap_xep');
// 	return redirect()->action('Site\SanphamController@get_search_site', [$search_site,$nha_mang,$khoang_gia,$sap_xep]); 
// 	}else {
// 	return redirect()->action('Site\SanphamController@get_search_site', $search_site); 
// 	}
	
// }
public function getdata(Request $request){
       
    $search_site = $request->get('search_site');
// exit("vao toi ham search_site");
    return redirect()->action('Site\SanphamController@postdata',$search_site);

}   


public function postdata($search_site){
    $cats=App\Cat::all();
    $cat_name = App\Cat::all();
    $product_all = DB::table('product')->where('status_product','=','1')->get();
    $products = DB::table('product')->where('name','LIKE','%$search_site%')->orderBy('id', 'DESC')->paginate(7);
    $count_product = count($products);
    
    $title=$search_site;
    $_SESSION['search_site'] = $search_site;
    return view('site.search_site')->with('products',$products)->with('count_product',$count_product)->with('title',$title)->with('cats',$cats)->with('cat_name',$cat_name)->with('search_site',$search_site);
}
/****************** payment paypal **********************/
public function get_pay_pal (Request $request)  {
  echo "bạn đã vào đây";
}


    /*********** filter product *************************/
   public function getdata_filter(Request $request){
        $min_price = $request->input('min_price');
        $cat_id =  $request->input('cat_id');

        $max_price = $request->input('max_price');
            return redirect()->action('Site\SanphamController@postdata_filter', [$min_price,$max_price,$cat_id]);
    }

    public function postdata_filter($min_price,$max_price,$cat_id){

        $cats=App\Cat::all();
        $cat=App\Cat::find($cat_id);
        $product_all = DB::table('product')->where('status_product','=','1')->get();
        //exit("vao toi ham get_search_site");
        $products=DB::table('product')->where('price', '>=', $min_price)->where('price', '<=', $max_price)->where('cat_id', 'LIKE', "%-".$cat_id."-%")->orderBy('id', 'DESC')->paginate(9);
        $count_prodcut_cat = count($products);
        $min_price_old = DB::table('product')->where('status_product','=','1')->selectRaw('min(price_old) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->first();
        $max_price_old = DB::table('product')->where('status_product','=','1')->selectRaw('max(price_old) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->first();
        $min_price_new = DB::table('product')->where('status_product','=','1')->selectRaw('min(price) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->first();
        $max_price_new = DB::table('product')->where('status_product','=','1')->selectRaw('max(price) as price')->where('cat_id', 'LIKE', "%-".$cat_id."-%")->first();
       $min_price_title=$min_price;
       $max_price_title=$max_price;
   
        return view('site.filter')->with('min_price',$min_price_title)->with('max_price',$max_price_title)->with('products',$products)->with('min_price_title',$min_price_title)->with('max_price_title',$max_price_title)->with('min_price_old',$min_price_old)->with('max_price_old',$max_price_old)->with('count_prodcut_cat',$count_prodcut_cat)->with('product_all',$product_all)->with('min_price_new',$min_price_new)->with('max_price_new',$max_price_new)->with('cat',$cat);

    }
        

    /********   end  filter product *************************/
public function post_thong_tin_tin_tuc_new(Request $request){

    
    //{ ["name"]=> string(16) "Lê Đình Trinh" ["email"]=> string(23) "trinhld.fpt11@gmail.com" ["tel"]=> string(10) "0982951221" ["province"]=> string(1) "0" ["address"]=> string(54) "Xã Thiệu Ngọc - Huyện Thiệu Hóa - Thanh Hóa" ["note"]=> string(0) "" } đây là đơn hàng 21
    $user_info_phone=$request->input('email');

        //  $url_img=base_path().'/resources/views/site/lienhe-s.blade.php';
                //goi thu vien
                
    //  echo base_path().'/gui-mail/class.smtp.php';
    include(base_path().'/gui-mail/class.smtp.php');
    include(base_path().'/gui-mail/class.phpmailer.php');
    include(base_path().'/gui-mail/functions.php');
    

    
    $title = 'Thông tin khách hàng';

    $nTo = 'MuaChung';
    $mTo = 'tuantkhb@gmail.com';
    $diachi = 'tuantkhb@gmail.com'; 
    
    
                            $content = "Số ĐT: ".$user_info_phone;
                            
                
                
                
                            $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                            if($mail==1){
                                   include(base_path().'/gui-mail/mail_ok.php');
                                   unset ($_SESSION["don_hang"]);

                            }
                            else{
                              include(base_path().'/gui-mail/error.php');
                             }
                            
    
    
        
        
        
        
}


public function post_cart_don_hang(Request $request){

    
    
    $email=$request->input('email');
    include(base_path().'/gui-mail/class.smtp.php');
    include(base_path().'/gui-mail/class.phpmailer.php');
    include(base_path().'/gui-mail/functions.php');
    

    
    $title = 'Thông tin khách hàng';

    $nTo = 'Đăng ký';
    $mTo = 'tamkhuong2234@gmail.com';
    $diachi = 'tamkhuong2234@gmail.com'; 
    
    
                            $content = "Mail: ".$email."<br/>";
                            
                
                
                
                            $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                            if($mail==1){
                                   include(base_path().'/gui-mail/mail_ok.php');
                                   unset ($_SESSION["don_hang"]);

                            }
                            else{
                            	include(base_path().'/gui-mail/error.php');
                             }
                            
    
    
        
        
        
        
    
    
    
    //var_dump ($user_info_array);
    
    
exit();
    
}


}


