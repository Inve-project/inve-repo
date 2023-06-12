<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserProduct;
use App\Models\Product;




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

            $data = DB::table('user_products')
                        ->select('user_products.id','user_products.product_name','products.name','user_products.category','user_products.units','user_products.quantity')
                       ->join('products', 'user_products.product_id', '=', 'products.id')
                       ->get();

            return view('Product.ListUserProduct',compact('data') );

            }

            public function AddUserProduct(Request $request){
                $id = $request->id;
                $product = Product::find($id);
                $quantity = 0;
                $existingProduct = UserProduct::where('product_id', $id)->first();
            
                if ($existingProduct){
                    return redirect()->back()->with('message', 'Product Exist');
                } else {
                    $data = new UserProduct;
                    $data->User_id = Auth::id();
                    $data->product_id = $product->id;
                    $data->product_name = $product->name;
                    $data->quantity = $quantity;
                    $data->category = $product->category;
                    $data->units = $product->units;
                    $data->save();
                    return redirect()->back()->with('message', 'Product added successfully');
                }
            }
            

            public function UserProductform(){

                    $data = Product::all();
                    return view('Product.UserProductform',compact('data') );
        
                    }

      
}
