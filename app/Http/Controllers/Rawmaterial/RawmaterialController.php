<?php

namespace App\Http\Controllers\Rawmaterial;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Rawmaterial;
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
        
     public function ListRawmaterial(){

            $data = rawmaterial::all();
            return view('Rawmaterial.ListRawmaterial',compact('data') );

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
