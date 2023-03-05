<?php namespace App\Http\Controllers\admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Paginator;
use Hash;
use Session;
use DB;
use App\comment;
use App\reply_comment;

class ReplyCommentController extends Controller{

    public function reply_comment(Request $request)  
    {
         $reply_comment = \DB::table('reply_comment')
        ->join('product', 'reply_comment.id', '=','product.id')
        ->join('comments', 'reply_comment.id_cm', '=','comments.id_cm')
        ->select('reply_comment.*','comments.comment_body','product.name')
        ->get();

        // $comment = comment::all();
         return view('admin.reply_comment.index')->with('reply_comment',$reply_comment);
    }

    public function getdeleterp($id_reply)
    {
      $reply_comment = reply_comment::where('id_reply',$id_reply);
      $reply_comment->delete();
          return redirect()->back();
	  }
}
?>