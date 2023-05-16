<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserProduct;
use App\Models\Product;
use App\Models\ProductUnits;
use App\Models\ProductCategory;




class UserProductController extends Controller
{
     /**
     * Display a listing of the resource.
     * 
     *
     * 
     * @return \Illuminate\Http\Response
     */    public function __construct()
     {
        $this->middleware('auth');
    }
    
     public function ListUserProduct(){

            $data = UserProduct::all();
            return view('Product.ListUserProduct',compact('data') );

            }

      
}
