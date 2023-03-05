<?php namespace App\Http\Controllers\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use View;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class SanphamController extends Controller {
public function index()
{
//$tin_tuc_khuyen_mai=DB::table('product')->where('cat_id', '=', "36")->orWhere('cat_id',"37")->where('status_product','=','1')->take(3)->get();
	//$dich_vu_cua_chung_toi=DB::table('cat')->where('parent_id', '=', "90")->where('status_cat','=',0 )->take(18)->orderBy('id', 'ASC')->get();
    $gioi_thieu=DB::table('cat')->where('id', '=', "91")->where('status_cat','=',0 )->get();
    $du_an_da_thuc_hien=DB::table('product')->where('cat_id', 'LIKE', "%-92-%")->where('status_product','=',1 )->take(8)->orderBy('id', 'ASC')->get();
	
	//$san_pham_theo_danh_muc = DB::table('cat')->where('parent_id','=','88')->get();
	$tin_tuc = DB::table('news')->where('cat_new_id','=','5')->where('status_new','=','1')->take(6)->orderBy('id','ASC')->get();
	$tin_tuc_moi = DB::table('news')->where('cat_new_id','=','15')->where('status_new','=','1')->orderBy('id','ASC')->get();
    $khach_hang = DB::table('news')->where('cat_new_id','=','14')->where('status_new','=','1')->orderBy('id','ASC')->get();
	$menu_top = DB::table('menus')->where('id', '=', "1")->get();

    return view('site.index')->with('tin_tuc_moi',$tin_tuc_moi)
    ->with('gioi_thieu',$gioi_thieu)->with('du_an_da_thuc_hien',$du_an_da_thuc_hien)->with('tin_tuc',$tin_tuc)->with('khach_hang',$khach_hang);
}
public function getCart(){
    return view('site.single');
}

public function getCartpost() {
    if ($_POST)
    {
        $name = trim($_POST['name']);
        echo $name;
    }
}
public function index_mobile()
{
$array_cat_nhap_khau=[7,14,22,25,17];
//$array_cat_nhap_khau=[7];
$array_cat_bao_ho_lao_dong=[10,15,18,19,16];
$san_pham_nhap_khau=DB::table('product')->whereIn('cat_id',$array_cat_nhap_khau)
->orWhere(function($query)use ($array_cat_nhap_khau)
{
$query->whereIn('cat_id_1',$array_cat_nhap_khau);
})
->where('status_product','=','1')->orderBy('id', 'DESC')->take(10)->get();
$trang_bi_bao_ho_lao_dong=DB::table('product')->whereIn('cat_id',$array_cat_bao_ho_lao_dong)
->orWhere(function($query)use ($array_cat_bao_ho_lao_dong)
{
$query->whereIn('cat_id_1',$array_cat_bao_ho_lao_dong);
})
->orWhere(function($query)use ($array_cat_bao_ho_lao_dong)
{
$query->whereIn('cat_id_2',$array_cat_bao_ho_lao_dong);
})
->where('status_product','=','1')->orderBy('id', 'DESC')->take(10)->get();
$mu_bao_ho_han_quoc=DB::table('product')->where('cat_id', '=', "27")->where('status_product','=','1')->orderBy('id', 'DESC')->take(8)->get(); 
$giay_bao_ho_han_quoc=DB::table('product')->where('cat_id', '=', "25")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$day_dai_an_toan_han_quoc=DB::table('product')->where('cat_id', '=', "17")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$giay_bao_ho_lao_dong=DB::table('product')->where('cat_id', '=', "15")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$day_dai_an_toan=DB::table('product')->where('cat_id', '=', "16")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$day_dai_an_toan=DB::table('product')->where('cat_id', '=', "16")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$mu_bao_ho_lao_dong=DB::table('product')->where('cat_id', '=', "18")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$trang_bi_pccc=DB::table('product')->where('cat_id', '=', "8")->orWhere('cat_id_1',"10")->orWhere('cat_id_2',"10")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
//var_dump($trang_bi_pccc );
//exit();
$thiet_bi_an_toan_giao_thong=DB::table('product')->where('cat_id', '=', "11")->orWhere('cat_id_1',"11")->orWhere('cat_id_2',"11")->where('status_product','=','1')->orderBy('id', 'DESC')->take(5)->get();
$lap_dat_luoi_cong_trinh=DB::table('product')->where('cat_id', '=', "12")->orWhere('cat_id_1',"12")->orWhere('cat_id_2',"12")->where('status_product','=','1')->orderBy('id', 'DESC')->take(4)->get();
$lap_dat_gian_giao=DB::table('product')->where('cat_id', '=', "21")->orWhere('cat_id_1',"21")->orWhere('cat_id_2',"21")->where('status_product','=','1')->orderBy('id', 'DESC')->take(4)->get();
$lap_dat_lan_can_an_toan=DB::table('product')->where('cat_id', '=', "23")->orWhere('cat_id_1',"23")->orWhere('cat_id_2',"23")->where('status_product','=','1')->orderBy('id', 'DESC')->take(4)->get();
$lap_dat_bien_bao_an_toan=DB::table('product')->where('cat_id', '=', "24")->orWhere('cat_id_1',"24")->orWhere('cat_id_2',"24")->where('status_product','=','1')->orderBy('id', 'DESC')->take(4)->get();
$thi_cong_an_toan=DB::table('product')->where('cat_id', '=', "13")->orWhere('cat_id_1',"13")->orWhere('cat_id_2',"13")->where('status_product','=','1')->take(5)->orderBy('id', 'DESC')->get();
$san_pham_ban_chay=DB::table('product')->where('ban_chay', '=', "1")->where('status_product','=','1')->take(5)->orderBy('id', 'DESC')->get();
$san_pham_ban_chay_1=DB::table('product')->where('ban_chay', '=', "1")->where('status_product','=','1')->skip(5)->orderBy('id', 'DESC')->take(5)->get();
return view('site_mobile.index')->with('san_pham_nhap_khau',$san_pham_nhap_khau)->with('trang_bi_bao_ho_lao_dong',$trang_bi_bao_ho_lao_dong)->with('trang_bi_pccc',$trang_bi_pccc)->with('thiet_bi_an_toan_giao_thong',$thiet_bi_an_toan_giao_thong)->with('lap_dat_luoi_cong_trinh',$lap_dat_luoi_cong_trinh)->with('lap_dat_gian_giao',$lap_dat_gian_giao)->with('lap_dat_lan_can_an_toan',$lap_dat_lan_can_an_toan)->with('lap_dat_bien_bao_an_toan',$lap_dat_bien_bao_an_toan)->with('thi_cong_an_toan',$thi_cong_an_toan)->with('san_pham_ban_chay',$san_pham_ban_chay)->with('san_pham_ban_chay_1',$san_pham_ban_chay_1)->with('mu_bao_ho_han_quoc',$mu_bao_ho_han_quoc)->with('giay_bao_ho_han_quoc',$giay_bao_ho_han_quoc)->with('day_dai_an_toan_han_quoc',$day_dai_an_toan_han_quoc)->with('giay_bao_ho_lao_dong',$giay_bao_ho_lao_dong)->with('day_dai_an_toan',$day_dai_an_toan)->with('mu_bao_ho_lao_dong',$mu_bao_ho_lao_dong);
}
public function create()
{
//
}
public function store()
{
//
}
public function show($id)
{
//
}
public function edit($id)
{
//
}
public function update($id)
{
//
}
public function destroy($id)
{
//
}
public function post_loc_sim(Request $request){
		
		
		echo $search_site = $request->input('search_site');
		
		
	$nha_mang = $request->input('nha_mang');
	if(isset($nha_mang)) {
	$nha_mang = $request->input('nha_mang');
	$khoang_gia = $request->input('khoang_gia');
	$sap_xep = $request->input('sap_xep');
	return redirect()->action('Site\SanphamController@get_loc_sim', [$search_site,$nha_mang,$khoang_gia,$sap_xep]); 
	}else {
	return redirect()->action('Site\SanphamController@get_loc_sim', $search_site); 
	}
		
}
public function post_loc_sim_in_cat(Request $request) {
	
	
	echo $cat_alias = $request->input('cat_alias'); echo "<br/>";
	echo $search_site = $request->input('search_site'); echo "<br/>";
	echo $nha_mang = $request->input('nha_mang');echo "<br/>";
	echo $khoang_gia = $request->input('khoang_gia');echo "<br/>";
	echo $sap_xep = $request->input('sap_xep');echo "<br/>";
	echo $all_url=$cat_alias."/".$nha_mang."/".$khoang_gia."/".$sap_xep;
	
	return redirect($all_url);
	

	
}
public function get_loc_sim($search_site,$nha_mang=null,$khoang_gia=null,$sap_xep=null){
	
		echo $search_site; echo "<br/>";
		echo $nha_mang;echo "<br/>";
		echo $khoang_gia;echo "<br/>";
	//	exit();
		
		if($khoang_gia==-1) {
		$khoang_gia_1=0;
		$khoang_gia_2=0;
		}elseif($khoang_gia==1) {
		$khoang_gia_1=0;
		$khoang_gia_2=1000000;
	}else if($khoang_gia==2) {
		$khoang_gia_1=1000000;
		$khoang_gia_2=3000000;
	}else if($khoang_gia==3) {
		$khoang_gia_1=3000000;
		$khoang_gia_2=5000000;
	}else if($khoang_gia==4) {
		$khoang_gia_1=5000000;
		$khoang_gia_2=10000000;
	}
	else if($khoang_gia==5) {
		$khoang_gia_1=10000000;
		$khoang_gia_2=100000000000;
	}
	
	//->where('cat_id', '=',$nha_mang)	
	$products=DB::table('product')->where('cat_id', 'LIKE', "%$search_site%")
	->where(function($query)use ($nha_mang)
		{
			 $query->where('cat_id', 'LIKE', "%$nha_mang%");
		})

	
	->orderBy('id', 'DESC')->paginate(count_phan_trang);
//	dd($products);
	
//	var_dump($products);
	var_dump(DB::table('product')->where('cat_id', 'LIKE', "%$search_site%")->where(function($query)use ($nha_mang)
		{
			
			$query->where('cat_id', 'LIKE', "%$nha_mang%");
			$query->where('cat_id', 'LIKE', "123");
			 
		})
		
		->orderBy('id', 'DESC')->toSql());
	
//	DB::table('product')->toSql();
	exit();

	$products_all=1;

	$title=$search_site;
	$value=$search_site;
	
	
				
	return view('site.cat')->with('products',$products)->with('title',$title)->with('products_all',$products_all)->with('value',$value)->with('nha_mang',$nha_mang)->with('khoang_gia',$khoang_gia)->with('sap_xep',$sap_xep);
		
	//	return "vao day rồi get_loc_sim";
		
}

public function search_site(Request $request){
	
	$search_site = $request->input('search_site');

	$nha_mang = $request->input('nha_mang');
	if(isset($nha_mang)) {
	$nha_mang = $request->input('nha_mang');
	$khoang_gia = $request->input('khoang_gia');
	$sap_xep = $request->input('sap_xep');
	return redirect()->action('Site\SanphamController@get_search_site', [$search_site,$nha_mang,$khoang_gia,$sap_xep]); 
	}else {
	return redirect()->action('Site\SanphamController@get_search_site', $search_site); 
	}
	
}
    public function getdata(Request $request){
        //	exit("vao toi ham search_site");
        $search_site = $request->input('search_site');

      
            //$products=DB::table('product')->where('name', 'LIKE', "%$search_site%")->orderBy('id', 'DESC')->paginate(count_phan_trang);

            return redirect()->action('Site\SanphamController@postdata', $search_site);


    }
    public function postdata($search_site){
        $cats=App\Cat::all();
        $product_all = DB::table('product')->where('status_product','=','1')->get();
        //exit("vao toi ham get_search_site");
        $products=DB::table('product')->where('name', 'LIKE', "%$search_site%")->orderBy('id', 'DESC')->paginate(3);
        $min_price = DB::table('product')->where('status_product', '', "1")->selectRaw('min(price_old) as price')->first();
		$max_price = DB::table('product')->where('status_product', '', "1")->selectRaw('max(price_old) as price')->first();
		$count_prodcut_cat = count($products);

       $title=$search_site;
        return view('site.search')->with('products',$products)->with('title',$title)->with('min_price',$min_price)->with('max_price',$max_price)->with('count_prodcut_cat',$count_prodcut_cat)->with('cats',$cats)->with('product_all',$product_all);

    }


public function get_search_site($search_site,$nha_mang=null,$khoang_gia=null,$sap_xep=null){
// dinh nghia mang	
	if($nha_mang==1){
		$nha_mang_1='viettel';
	}else if($nha_mang==2) {
		$nha_mang_1='vinaphone';
	}else if($nha_mang==3) {
		$nha_mang_1='mobifone';     
	}else if($nha_mang==4) {
		$nha_mang_1='vietnamobile	        ';     
	}else if($nha_mang==5) {
		$nha_mang_1='gmobile';     
	}else if($nha_mang==-1){
		$nha_mang_1=-1;
	}
	
	if($khoang_gia==1) {
		$khoang_gia_1=0;
		$khoang_gia_2=1000000;
	}else if($khoang_gia==2) {
		$khoang_gia_1=1000000;
		$khoang_gia_2=3000000;
	}else if($khoang_gia==3) {
		$khoang_gia_1=3000000;
		$khoang_gia_2=5000000;
	}else if($khoang_gia==4) {
		$khoang_gia_1=5000000;
		$khoang_gia_2=10000000;
	}
	else if($khoang_gia==5) {
		$khoang_gia_1=10000000;
		$khoang_gia_2=100000000000;
	}
	
	$i=0;
	if (strlen(strstr($search_site,'*')) > 0) {
		$i=1;
	}
	if($i==1) {
		
		$search_site_array=explode ( '*', $search_site);
		//	echo $search_site_array[0];
		//	echo $search_site_array[1];
		if(count($search_site_array)==2){
		// =2 thì tiếp tục chạy
		echo count($search_site_array);
		
		$products_all=$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(100000);
	//	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
	if($nha_mang>0) {
	if($khoang_gia<0) {
	if($sap_xep<0) {
	$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(100000);
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->orderBy('id', 'DESC')->paginate(count_phan_trang);
	}else if($sap_xep==0) { // de tự nhiên
	$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(100000);
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->orderBy('id', 'DESC')->paginate(count_phan_trang);
	}else if($sap_xep==1) {
		
	$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('price', 'DESC')->paginate(100000);
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->orderBy('price', 'DESC')->paginate(count_phan_trang); 
	

	
	}else if($sap_xep==2) {
	$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('price', 'DESC')->paginate(100000);
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->orderBy('price', 'ASC')->paginate(count_phan_trang);
	}
	}else if($khoang_gia>0) {
	if($sap_xep<0) {
	//echo $khoang_gia_1;
	//echo "<br/>";
	//echo $khoang_gia_2;
	

	$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
	
	
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
	
	
	
	}else if($sap_xep==0) { //de tu nhien
	

	$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
	
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
	
	
	
	}else if($sap_xep==1) {

		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
	
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
	
	}else if($sap_xep==2) {
		
	$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(100000);
		
	$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(count_phan_trang);
	
	
	
	}
	} 
	}else if($nha_mang<0) {
	if($khoang_gia<0) {
	if($sap_xep<0) {
		


		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==0) { // de tự nhiên
	

		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==1) {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('price', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('price', 'DESC')->paginate(count_phan_trang);

		
	}else if($sap_xep==2) {

		
		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('price', 'ASC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('price', 'ASC')->paginate(count_phan_trang);
		
	}
	}else if($khoang_gia>0) {
	if($sap_xep<0) {
	//echo $khoang_gia_1;
	//echo "<br/>";
	//echo $khoang_gia_2;
	

		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
	
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
	
	}else if($sap_xep==0) { //de tu nhien
	
		
		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==1) {

			$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
	
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
	}else if($sap_xep==2) {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(100000);
		
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(count_phan_trang);
	}
	}
	}	
	else {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "$search_site_array[0]%")->where('name', 'LIKE', "%$search_site_array[1]")->orderBy('id', 'DESC')->paginate(count_phan_trang);
	}

		}else {
			$products_all=0;
			$products=DB::table('product')->where('name', '=', "khongtontai")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		}
		
		
		/////////////////////
	}else if($i==0) {
	if($nha_mang>0) {
	if($khoang_gia<0) {
	if($sap_xep<0) {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
	}else if($sap_xep==0) { // de tự nhiên
	
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==1) {
			
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('price', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('price', 'DESC')->paginate(count_phan_trang);
		
	}else if($sap_xep==2) {
		


		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('price', 'ASC')->paginate(100000);
		
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->orderBy('price', 'ASC')->paginate(count_phan_trang);
		
	}
	}else if($khoang_gia>0) {
	if($sap_xep<0) {
	//echo $khoang_gia_1;
	//echo "<br/>";
	//echo $khoang_gia_2;
	

		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
		
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		

		
		
	}else if($sap_xep==0) { //de tu nhien
	


		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
		
	}else if($sap_xep==1) {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);		

		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==2) {
		
			$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(100000);	
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('discount', '=',$nha_mang_1)->where('discount', '=',$nha_mang_1)->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(count_phan_trang);
	}
	} 
	}else if($nha_mang<0) {
	if($khoang_gia<0) {
	if($sap_xep<0) {
		
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
	}else if($sap_xep==0) { // de tự nhiên
	
		$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
	}else if($sap_xep==1) {
		
		$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('price', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('price', 'DESC')->paginate(count_phan_trang);
		
	}else if($sap_xep==2) {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('price', 'ASC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('price', 'ASC')->paginate(count_phan_trang);
		
	}
	}else if($khoang_gia>0) {
	if($sap_xep<0) {
	//echo $khoang_gia_1;
	//echo "<br/>";
	//echo $khoang_gia_2;
	
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==0) { //de tu nhien
	
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
	}else if($sap_xep==1) {
		
	$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(100000);

	$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
		
		
	}else if($sap_xep==2) {
		
		$products_all=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->where('price','>',$khoang_gia_1)->where('price','<',$khoang_gia_2)->orderBy('id', 'ASC')->paginate(count_phan_trang);
	}
	}
	}	
	else {
		
		$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(100000);
		
		$products=DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(count_phan_trang);
		
	}
}

//	$products_all =DB::table('product')->where('name', 'LIKE', "%$search_site")->orderBy('id', 'DESC')->paginate(100000);

	$title=$search_site;
	$value=$search_site;

	return view('site.search')->with('products',$products)->with('title',$title)->with('products_all',$products_all)->with('value',$value)->with('nha_mang',$nha_mang)->with('khoang_gia',$khoang_gia)->with('sap_xep',$sap_xep);
}

}