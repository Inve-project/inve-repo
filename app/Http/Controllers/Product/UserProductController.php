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

            $data = UserProduct::all();
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
