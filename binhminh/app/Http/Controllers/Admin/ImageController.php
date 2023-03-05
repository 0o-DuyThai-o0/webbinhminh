<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;
use Hash;
use Session;
use Input;
use Validator;
class ImageController extends Controller {


     /*
    public function store(Request $r)
    {
        $image = Input::file('file');
        $validator = Validator::make([$image], ['image' => 'required']);
        if ($validator->fails()) {
            return $this->errors(['message' => 'Not an image.', 'code' => 400]);
        }
        $destinationPath = storage_path() . '/uploads';
        if(!$image->move($destinationPath, $image->getClientOriginalName())) {
            return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        }
        return response()->json(['success' => true], 200);
    }
    */
    public function upload(Request $r){
        $image = Input::file('image');
        echo $image;
        exit();

    }
}