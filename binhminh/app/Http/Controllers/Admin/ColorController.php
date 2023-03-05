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
class ColorController extends Controller {
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
         $color = App\Color::all();
         return view('admin.color.index')->with('color',$color);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/color/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'ma_mau' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin/color')
                ->withErrors($validator)
                ->withInput();
        }
        $color = new App\Color;
        $color->ma_mau = $request->input('ma_mau');        
        $color->save();
        Session::flash('message1', 'Tạo mới Thành công');
        return redirect('admin/color');
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
        $color_edit = App\Color::find($id);
        return view('admin/color/edit')->with('color_edit',$color_edit)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {

        $color = App\Color::find($id);

        $color->ma_mau = $request->input('ma_mau');
        
  
        $color->update();
        Session::flash('message1', 'Update Thành công');
            return redirect('admin/color');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $color = App\Color::find($id);
        $color->delete();
        return redirect()->back();

    }

    
}
