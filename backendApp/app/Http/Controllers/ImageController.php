<?php

namespace App\Http\Controllers;

use App\Enums\ImgType;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\ImageType as UtilsImageType;
use Symfony\Component\Console\Input\Input;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $image = image::all();
        return response()->json([
            'success' => true,
            'message'=>'All Products',
            'product'=>$image,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'image'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'fail'=> false,
                'message'=>"Product Not Strored",
                'error'=>$validator->errors(),
            ]);
        }
        

        $img = image::Create($input);
        return response()->json([
            'success'=>true,
            'message'=>"Data Stored successfully",
            'Product'=>$img
        ]);
    }
}
