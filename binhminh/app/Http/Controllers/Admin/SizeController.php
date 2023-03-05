<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use File;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Paginator;
use Hash;
use Session;
use Input;
use Carbon\Carbon;
use Validator;
class SizeController extends Controller {
    // protected $rules = [
    //     'name' => ['required|name|unique:home'],
    //     'password' => 'required|min:8',
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request)
    {
         $size = App\Dinhdang::all();
         return view('admin.dinh_dang_field.index')->with('size',$size);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/dinh_dang_field/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Request $request)

    {

        // $validator = Validator::make($request->all(), [
        //     'ten_dinh_dang' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect('admin/size')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        $size = new App\Dinhdang;
        $size->ten_dinh_dang = $request->input('ten_dinh_dang');
        $size->mo_ta = $request->input('mo_ta');
        $size->admin_id = $_SESSION['admin_id'];
        $size->save();
        Session::flash('message1', 'Tạo mới Thành công');
        return redirect('admin/dinh_dang_field');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $dinh_dang = App\Dinhdang::find($id);
        return view('admin/dinh_dang_field/edit')->with('dinh_dang',$dinh_dang)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {

        $size = App\Dinhdang::find($id);

        $size->ten_dinh_dang = $request->input('ten_dinh_dang');
        $size->mo_ta = $request->input('mo_ta');
        $size->admin_id = $_SESSION['admin_id'];
       
  
        $size->update();
        Session::flash('message1', 'Update Thành công');
            return redirect('admin/dinh_dang_field');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
        $size = App\Dinhdang::find($id);
        $size->delete();
        return redirect()->back();

    }

    
}
