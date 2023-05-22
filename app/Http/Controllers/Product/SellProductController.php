<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SellProduct;
use App\Models\UserProduct;
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

            $data = SellProduct::all();
            return view('Product.ListSellProduct',compact('data') );

            }

            public function SellProductform(){
              
              $data = userProduct::all();
              return view('Product.SellProductform',compact('data') );
  
              }

              public function Addsellproduct(Request $request){
              
                     $data = new sellProduct;
                     $data->User_id = Auth::id();
                     $data->product_id = $request->id;
                     $data->quantity = $request->quantity;
                     $data->amount = $request->amount;
                     $data->date = $request->date;
                     $data->save();
                     return redirect()->back()->with('message', 'Product aold successfully');
         
                     }

}
