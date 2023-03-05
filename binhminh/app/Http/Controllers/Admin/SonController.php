<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
class SonController extends Controller {

	public function index( Request $request)
	{
		$session_value='0';
		$sons1 = App\Son::all();
	//	var_dump($sons1);
		$sons = App\Son::paginate(10);
		if (Session::has('admin'))
		{
			$session_value = Session::get('admin');
		}
		
		return view('admin.son.index')->with('sons',$sons)->with('sons1',$sons1)->with('session_value',$session_value);
		
	}

	public function show($id)
	{
		echo "show";
	}

	public function edit($id)
	{
		
			$son = App\Son::find($id);
		$sons = App\Son::all();


		return view('admin/son/edit')->with('son',$son)->with('id',$id)->with('sons',$sons);
	}
	public function create()
	{
		$sons=App\Son::all();
//		$cat_parents = DB::table('cat')->where('parent_id', 0)->get();

		return view('admin.son.create')->with('sons',$sons);
	}
	public function store( Request $request)
	{ 	
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',

        ]);
        if ($validator->fails()) {
            return redirect('admin/son')
                        ->withErrors($validator)
                        ->withInput();
        }
		$son = new App\Son;
		$son->name = $request->input('name');
		$son->save(); 
		return redirect('admin/son');
	}
	public function update(Request $request,$id)
	{

		$son = App\Son::find($id);
		$son->name = $request->input('name');
		$son->update();
		return redirect('admin/son');
	}



}
