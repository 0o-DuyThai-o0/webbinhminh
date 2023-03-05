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
class AttproductController extends Controller {
//     protected $rules = [
//         'name_color' => ['required|name_color|unique:att_product|unique:size'],
//         'password' => 'required|min:8',
//     ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request)
    {
         $att_product = App\Attproduct::all();
         return view('admin.attribute_product.color.index')->with('att_product',$att_product);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/attribute_product/color/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name_color' => 'name_color|unique:att_product',
            'size' => 'unique:att_product',
        ]);
        if ($validator->fails()) {
            return redirect('admin/attribute_product/color')
                ->withErrors($validator)
                ->withInput();
        }
        $attproduct = new App\Attproduct;
        $attproduct->name_color = $request->input('favcolor');
        $attproduct->ma_mau = $request->input('ma_mau');
        $attproduct->save();
        Session::flash('message1', 'Tạo mới Thành công');
        return redirect('admin/attribute_product/color');
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
        $color_edit = App\Attproduct::find($id);
        return view('admin/attribute_product/color/edit')->with('color_edit',$color_edit)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {

        $color = App\Price::find($id);

        $color->name = $request->input('name');
    
  
        $color->update();
        Session::flash('message1', 'Update Thành công');
            return redirect('admin/attribute_product/color');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $attproduct = App\Attproduct::find($id);
        $attproduct->delete();
        return redirect()->back();

    }

    
}
