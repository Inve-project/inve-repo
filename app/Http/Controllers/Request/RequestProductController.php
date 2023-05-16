<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RequestProduct;
use App\Models\Product;


class RequestProductController extends Controller
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

    public function RequestProduct(){

        $data = Product::all();
        return view('Request.RequestProduct',compact('data') );
        
    }

    public function AddRequestProduct(Request $request){
      
        $quantity = $request->quantity;
        $id = $request->id;
        $status = "Requested";

        $data=new RequestProduct;
        $data->User_id=Auth::id();
        $data->product_id=$id;
        $data->quantity=$quantity;
        $data->date=$request->date;
        $data->status=$status;
        $data->save();

        // $db = DB::table('products')
        //                 ->select('quantity')
        //                 ->where('id', '=', $id)
        //                 ->get();
        // $Newquantity = $db[0]->quantity;
        // $Newquantity += $quantity;

        // DB::table('products')
        //                 ->where('id', $id)
        //                 ->update(['quantity' => $Newquantity]);


        return redirect()->back()->with('message','New Product Added Successfuly');
   
       }
       
    public function ListRequestProduct(){

           $data = RequestProduct::all();
        return view('Request.ListRequestProduct',compact('data') );

           }
}
