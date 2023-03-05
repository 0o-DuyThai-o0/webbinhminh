<?php namespace App\Http\Controllers\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Session;
use Redirect;
use Mail;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class MailController extends Controller {

    public function callback(Request $request)
     {
            $input = $request->all();
            Mail::send('mailfb', array(
                'phone'=>$input["phone"]),
                function($message){
                $message->to('tamkhuong2234@gmail.com', 'Visitor')->subject('Đăng ký để được gọi lại');
            });
            Session::flash('message1', 'Cảm ơn bạn đã để lại số điện thoại, chúng tôi sẽ liên lạc lại với bạn');
            return redirect()->back();


            // $request->session()->flash('status', 'Tạo bài viết thành công!');
        }
    public function muahang(Request $request)
     {
            $input = $request->all();
            Mail::send('dangky', array(
                'name'=>$input["name"],
                'email'=>$input["email"],
                'phone'=>$input["phone"],
                'note'=>$input["note"],
                'thanhpho'=>$input["diachi"],
                'diachi'=>$input["address"],
                'pay'=>$input["pay_method"],
                'total_count'=>$input["total_price_product"]
                 
            ),
                function($message){
                $message->to('tamkhuong2234@gmail.com', 'Visitor')->subject('Thông tin khách hàng');
            });
            Session::flash('message1', 'Cảm ơn bạn đã Mua Hàng, chúng tôi sẽ liên lạc lại với bạn');
            unset($_SESSION['don_hang']);
            return redirect()->back();


            // $request->session()->flash('status', 'Tạo bài viết thành công!');
        }

}