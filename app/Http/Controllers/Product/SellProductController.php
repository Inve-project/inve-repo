<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SellProduct;
use App\Models\Product;

class SellProductController extends Controller
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
    
     public function ListSellProduct(){

            $data = UserProduct::all();
            return view('Product.ListSellProduct',compact('data') );

            }

}
