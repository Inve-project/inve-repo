<?php

namespace App\Http\Controllers\Rawmaterial;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PayRawmaterial;
use App\Models\Rawmaterial;
use App\Models\Vendor;
use App\Models\Payment;
use App\Models\RawmaterialUnits;
use App\Models\RawmaterialCategory;




class RawmaterialController extends Controller
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

    public function Rawmaterial(){

        $data = RawmaterialUnits::all();
        $datas = RawmaterialCategory::all();
        return view('Rawmaterial.Rawmaterial',compact('data','datas') );

    }

    public function AddRawmaterial(Request $request){
         $quantity = 0 ;
        $data=new rawmaterial;
         $data->User_name=Auth::id();
         $data->name=$request->name;
         $data->quantity=$quantity;
         $data->category=$request->category;
         $data->units=$request->units;
         $data->save();
         return redirect()->back()->with('message','New Rawmaterial Added Successfuly');
    
        }

        public function AddPayRawmaterial(Request $request){
            $id = $request->id;
            $quantity = $request->quantity;
            $db = DB::table('rawmaterials')
             ->select('quantity')
             ->where('id', '=', $id)
             ->get();
            $quantityInStock = $db[0]->quantity;
            $quantityInStock += $quantity;

            DB::table('rawmaterials')
            ->where('id', $id)
            ->update(['quantity' => $quantityInStock]);

            $material = rawmaterial::find($id);
            $name = "purchase $material->name";

            $data=new payrawmaterial;
            $data->User_id=Auth::id();
            $data->name=$name;
            $data->quantity=$quantity;
            $data->vendor=$request->vendor;
            $data->amount=$request->amount;
            $data->date=$request->date;
            $data->save();

            $datas=new Payment;
            $datas->User_id=Auth::id();
            $datas->name=$name;
            $datas->amount=$request->amount;
            $datas->date=$request->date;
            $datas->save();
            return redirect()->back()->with('message','Purchase Rawmaterial done Successfuly');
       
           }

        
     public function ListRawmaterial(){

            $data = rawmaterial::all();
            return view('Rawmaterial.ListRawmaterial',compact('data') );

            }

            public function ListPayRawmaterial(){

                $data = payrawmaterial::all();
                return view('Rawmaterial.ListPayRawmaterial',compact('data') );
    
                }

            public function PayRawmaterial(){

                $data = rawmaterial::all();
                $vendor = vendor::all();
                return view('Rawmaterial.PayRawmaterial',compact('data','vendor') );
    
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
