<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\comment;
use App\product;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

	public function store(Request $request )
	{
		
				comment::create([	
					'id' => $request->id,
					'user_id',
					'comment_body' => $request->comment_body,
				]);

				return redirect()->back();
	}	

	public function comment_haha()
	{
		$comment = db::table('comments');
		return view('site.comment')->with('comment', $comment);
	}

	public function getdelete($id_cm)
    {
      $comment = comment::where('id_cm',$id_cm);
      $comment->delete();
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
