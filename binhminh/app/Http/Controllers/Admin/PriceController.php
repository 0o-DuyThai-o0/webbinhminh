<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use File;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Paginator;
use App\Http\Requests\FieldRequest;
use Hash;
use Session;
use Input;
use Carbon\Carbon;
use Validator;
class PriceController extends Controller {
    // protected $rules = [
    //     'name' => ['required|name|unique:home'],
    //     'password' => 'required|min:8',
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( )
    {
      
         $vitri = App\Vitri::all();
         return view('admin.vi_tri_field.index')->with('vitri',$vitri);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/vi_tri_field/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( FieldRequest $request)
    {

        
        $price = new App\Vitri;
        $price->ten_vi_tri = $request->input('name_field');
        $price->stt = $request->input('stt');
        $price->mo_ta = $request->input('mo_ta');
        $price->admin_id = $_SESSION['admin_id'];;
        $price->save();
        Session::flash('message1', 'Tạo mới Thành công');
        return redirect('admin/vi_tri_field');
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
        $vitri_edit = App\Vitri::find($id);
        return view('admin/vi_tri_field/edit')->with('vitri_edit',$vitri_edit)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(FieldRequest $request,$id)
    {

        $price = App\Vitri::find($id);

        $price->ten_vi_tri = $request->input('name_field');

        $price->stt = $request->input('stt');
        $price->mo_ta = $request->input('mo_ta');
        $price->admin_id = $_SESSION['admin_id'];
        $price->save();
        Session::flash('message1', 'Update Thành công');
            return redirect('admin/vi_tri_field');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $price = App\Vitri::find($id);
        $price->delete();
        return redirect()->back();

    }
        public function delete_s_code(Request $request){
           
         $array_product=$request->input('checkbox');

         $select_publisher=$request->input('publish_unpublish');
         $error=null;
          if($select_publisher==1) {
                if(count($array_product) > 0) {
                    foreach($array_product as $product ){
                        $kaka = App\Vitri::find($product);
                        $kaka->delete();
                        Session::flash('message1', 'Xóa thành công');
                        return redirect()->back();
                    }
                }else {
                     Session::flash('message1', 'Không có field nào được chọn');
                     return redirect()->back();
                }
            
        }

    }


    
}
