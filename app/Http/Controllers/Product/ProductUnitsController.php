<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductUnits;

class ProductUnitsController extends Controller
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
    
    public function ProductUnits(){
        return view('ProductUnits.ProductUnits');
    }

    public function AddProductUnits(Request $request){

         $data=new ProductUnits;
         $data->User_id=Auth::id();
         $data->name=$request->name;
         $data->save();
         return redirect()->back()->with('message','New Units Added Successfuly');
    
        }

        public function ListProductUnits(){

            $data = ProductUnits::all();
            return view('ProductUnits.ListProductUnits',compact('data') );

            }

         public function deleteProductUnits($id){

                $data = ProductUnits::find($id);
                $data->delete();
               return redirect()->back()->with('message','Units Deleted Successfuly');
                }

        public function editProductUnits($id){

                    $data = ProductUnits::find($id);
                    return view('ProductUnits.editProductUnits',compact('data') );
                    }

        public function updateProductUnits(Request $request, $id){

                    $data = ProductUnits::find($id);
                         $data->User_id=Auth::id();
                         $data->name=$request->name;
                         $data->save();
                         return redirect()->back()->with('message','Units Apdated Successfuly');
                    
                        }

}
