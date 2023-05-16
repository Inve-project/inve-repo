<?php

namespace App\Http\Controllers\Manufactured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ManufacturedProduct;
use App\Models\RawmaterialCategory;
use App\Models\Product;

class ManufacturedProductController extends Controller
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

    public function ManufacturedProduct(){

        $data = Product::all();
        return view('Manufacture.ManufacturedProduct',compact('data') );

        
    }

    public function AddManufacturedProduct(Request $request){
      
        $quantity = $request->quantity;
        $id = $request->id;

        $data=new ManufacturedProduct;
        $data->User_id=Auth::id();
        $data->product_id=$id;
        $data->quantity=$quantity;
        $data->date=$request->date;
        $data->Intake=$request->intake;
        $data->save();

        $db = DB::table('products')
                        ->select('quantity')
                        ->where('id', '=', $id)
                        ->get();
        $Newquantity = $db[0]->quantity;
        $Newquantity += $quantity;

        DB::table('products')
                        ->where('id', $id)
                        ->update(['quantity' => $Newquantity]);


        return redirect()->back()->with('message','New Product Added Successfuly');
   
       }
       
    public function ListManufacturedProduct(){

           $data = ManufacturedProduct::all();
           return view('Manufacture.ListManufacturedProduct',compact('data') );

           }

        public function deleteRawmaterial($id){

               $data = rawmaterial::find($id);
               $data->delete();
              return redirect()->back()->with('message','Raw material Deleted Successfuly');
               }

       public function editRawmaterial($id){

                   $data = rawmaterial::find($id);
                   $category = RawmaterialCategory::all();
                   $units = RawmaterialUnits::all();
                   return view('Rawmaterial.editRawmaterial',compact('data','category','units') );
                   }

       public function updateRawmaterial(Request $request, $id){

           $data = rawmaterial::find($id);
           $data->User_name=Auth::id();
           $data->category=$request->category;
           $data->units=$request->units;
           $data->save();
                        return redirect()->back()->with('message','Category Apdated Successfuly');
                   
                       }

}
