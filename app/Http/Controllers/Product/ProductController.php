<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductUnits;
use App\Models\ProductCategory;




class ProductController extends Controller
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

    public function Product(){

        $data = ProductUnits::all();
        $datas = ProductCategory::all();
        return view('Product.Product',compact('data','datas') );

    }

    public function AddProduct(Request $request){
        $quantity = 0 ;
        $data=new Product;
         $data->User_id=Auth::id();
         $data->name=$request->name;
         $data->quantity=$quantity;
         $data->category=$request->category;
         $data->units=$request->units;
         $data->save();
         return redirect()->back()->with('message','New Product Added Successfuly');
    
        }
     public function ListProduct(){

            $data = Product::all();
            return view('Product.ListProduct',compact('data') );

            }

         public function deleteProduct($id){

                $data = Product::find($id);
                $data->delete();
               return redirect()->back()->with('message','Raw material Deleted Successfuly');
                }

        public function editProduct($id){

                    $data = Product::find($id);
                    $units = ProductUnits::all();
                    $category = ProductCategory::all();
                    return view('Product.editProduct',compact('data','units','category') );
                    }

        public function updateProduct(Request $request, $id){

            $data = Product::find($id);
            $data->User_id=Auth::id();
            $data->category=$request->category;
            $data->units=$request->units;
            $data->save();
         return redirect()->back()->with('message','Category Apdated Successfuly');
                    
                        }

}
