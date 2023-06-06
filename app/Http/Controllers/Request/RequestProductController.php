<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RequestProduct;
use App\Models\Product;
use App\Models\UserProduct;
use Carbon\Carbon;




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

        $data = DB::table('request_products')
                   ->select('products.id','products.name','products.units')
                   ->join('products', 'request_products.product_id', '=', 'products.id')
                   ->distinct()
                   ->get();
        return view('Request.RequestProduct',compact('data') );
        
    }

    public function AddRequestProduct(Request $request){
      
        $quantity = $request->quantity;
        $id = $request->id;
        $status = "Requested";
        $color = "info";

        $data=new RequestProduct;
        $data->User_id=Auth::id();
        $data->product_id=$id;
        $data->quantity=$quantity;
        $data->date=$request->date;
        $data->status=$status;
        $data->color=$color;
        $data->save();
        return redirect()->back()->with('message','New Product Added Successfuly');
   
       }
       
    public function ListRequestProduct(){

           $data = DB::table('request_products')
                     ->select('request_products.id','products.name','request_products.quantity','request_products.created_at','request_products.date','request_products.color','request_products.status')
                     ->join('products', 'request_products.product_id', '=', 'products.id')
                     ->get();

           return view('Request.ListRequestProduct',compact('data') );

           }

    public function onprogress($id)
           {
               $data = RequestProduct::find($id);
               $status = $data->status;
           
               if ($status == "Requested") {
                   DB::table('request_products')
                       ->where('id', $id)
                       ->update([
                           'status' => 'Onprogress',
                           'color' => 'warning'
                       ]);
                   return redirect()->back()->with('message', 'Ongoing status is active');
               } else {
                   return redirect()->back()->with('message', 'Invalid Action');
               }
            
           }

           public function approved($id)
           {    
               $currentDate = Carbon::now();
               $formattedDateTime = $currentDate->format('Y-m-d');

               $data = RequestProduct::find($id);
               $ProductId = $data->product_id;
               $status = $data->status;
               $quantity1 = $data->quantity;
           
               $product = Product::find($ProductId);
               $quantity2 = $product->quantity;
           
               if ($status == "Approved") {
                   return redirect()->back()->with('message', 'Invalid Action');
               } elseif ($quantity1 > $quantity2) {
                   return redirect()->back()->with('message', 'Out of stock, wait for production');
               } else {
                   $quantity = $quantity2 - $quantity1;
                   DB::table('products')
                       ->where('id', $ProductId)
                       ->update(['quantity' => $quantity]);
           
                   $db = DB::table('user_products')
                       ->select('quantity')
                       ->where('product_id', '=', $ProductId)
                       ->get();
                   $quantityInStock = $db[0]->quantity;
                   $quantityInStock += $quantity1;
           
                   DB::table('user_products')
                       ->where('product_id', $ProductId)
                       ->update(['quantity' => $quantityInStock]);
           
                   DB::table('request_products')
                       ->where('id', $id)
                       ->update([
                           'date' => $formattedDateTime,
                           'status' => 'Approved',
                           'color' => 'success'
                       ]);
           
                   return redirect()->back()->with('message', 'Approved Successfully');

               }
           }
           
           
}
