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
class CommentAdController extends Controller{
    public function comment( Request $request)
    {
         $comment = \DB::table('comments')
        ->join('product', 'comments.id', '=','product.id')
        ->select('comments.*','product.name')
        ->get();
        // $comment = comment::all();
         return view('admin.comment.index')->with('comment',$comment);
         return view('site.comment')->with('comment',$comment);
    }

    public function getdelete($id_cm)
    {
      $comment = comment::where('id_cm',$id_cm);
      $comment->delete();
          return redirect()->back();
	  }
}
?>