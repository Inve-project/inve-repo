<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
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
    
    public function ProductCategory(){
        return view('ProductCategory.ProductCategory');
    }

    public function AddProductCategory(Request $request){

        $data=new ProductCategory;
         $data->User_id=Auth::id();
         $data->name=$request->name;
         $data->save();
         return redirect()->back()->with('message','New Category Added Successfuly');
    
        }

        public function ListProductCategory(){

            $data = ProductCategory::all();
            return view('ProductCategory.ListProductCategory',compact('data') );

            }

         public function deleteProductCategory($id){

                $data = ProductCategory::find($id);
                $data->delete();
               return redirect()->back()->with('message','Category Deleted Successfuly');
                }

        public function editProductCategory($id){

                    $data = ProductCategory::find($id);
                    return view('ProductCategory.editProductCategory',compact('data') );
                    }

        public function updateProductCategory(Request $request, $id){

                    $data = ProductCategory::find($id);
                         $data->User_id=Auth::id();
                         $data->name=$request->name;
                         $data->save();
                         return redirect()->back()->with('message','Category Apdated Successfuly');
                    
                        }

}
