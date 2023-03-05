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
            'phone'=>$input["phone"],
            ),
            function($message){
            $message->to('tamkhuong2234@gmail.com', 'Visitor')->subject('Đăng ký mua hàng');
        });
        Session::flash('message1', 'Mua Hàng thành công, chúng tôi sẽ liên lạc lại với bạn');
        return redirect()->back();


        // $request->session()->flash('status', 'Tạo bài viết thành công!');
    }


}