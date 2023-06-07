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

            $data = DB::table('sell_products')
                  ->select('sell_products.id','products.name','sell_products.quantity','sell_products.amount','sell_products.date')
                  ->join('products', 'sell_products.product_id', '=', 'products.id')
                  ->get();

            return view('Product.ListSellProduct',compact('data') );

            }

            public function SellProductform(){
              
              $data = DB::table('user_products')
                          ->select('user_products.id','products.name','products.units')
                          ->join('products', 'user_products.product_id', '=', 'products.id')
                     //      ->distinct()
                          ->get();

              return view('Product.SellProductform',compact('data') );
  
              }

              public function Addsellproduct(Request $request){
              
                     $id = $request->id;
                     $product = userProduct::find($id);
                     $quantity1 = $product->quantity;
                     $quantity2 = $request->quantity;

                     if ($quantity1 < $quantity2) {
                            return redirect()->back()->with('message', 'Out of stock, wait for production');
                        } else {

                     $data = new sellProduct;
                     $data->User_id = Auth::id();
                     $data->product_id = $id;
                     $data->quantity = $quantity2;
                     $data->amount = $request->amount;
                     $data->date = $request->date;
                     $data->save();

                     $db = DB::table('user_products')
                     ->select('quantity')
                     ->where('id', '=', $id)
                     ->get();
                     $quantityInStock = $db[0]->quantity;
                     $quantityInStock -= $quantity2;
 
                     DB::table('user_products')
                            ->where('id', $id)
                            ->update(['quantity' => $quantityInStock]);

                     return redirect()->back()->with('message', 'Product Sold successfully');
                        }
         
                     }

}
