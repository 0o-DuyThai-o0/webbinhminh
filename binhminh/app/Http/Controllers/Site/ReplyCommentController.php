<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\reply_comment;
use App\product;
use App\comment;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyCommentController extends Controller {

	public function storerp(Request $request )
	{
		
				reply_comment::create([	
                    'id_cm' => $request->id_cm,
					'id' => $request->id,
					'user_id',
					'comment_reply' => $request->comment_reply,
				]);

				return redirect()->back();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	public function getdeleterp($id_reply)
    {
      $reply_comment = reply_comment::where('id_reply',$id_reply);
      $reply_comment->delete();
          return redirect()->back();
	  }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
