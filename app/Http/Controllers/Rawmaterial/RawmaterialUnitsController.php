<?php

namespace App\Http\Controllers\Rawmaterial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RawmaterialUnits;

class RawmaterialUnitsController extends Controller
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
    
    public function RawmaterialUnits(){
        return view('RawmaterialUnits.RawmaterialUnits');
    }

    public function AddRawmaterialUnits(Request $request){

         $data=new rawmaterialUnits;
         $data->User_id=Auth::id();
         $data->Units_name=$request->name;
         $data->save();
         return redirect()->back()->with('message','New Units Added Successfuly');
    
        }

        public function ListRawmaterialUnits(){

            $data = rawmaterialUnits::all();
            return view('RawmaterialUnits.ListRawmaterialUnits',compact('data') );

            }

         public function deleteRawmaterialUnits($id){

                $data = rawmaterialUnits::find($id);
                $data->delete();
               return redirect()->back()->with('message','Units Deleted Successfuly');
                }

        public function editRawmaterialUnits($id){

                    $data = rawmaterialUnits::find($id);
                    return view('RawmaterialUnits.editRawmaterialUnits',compact('data') );
                    }

        public function updateRawmaterialUnits(Request $request, $id){

                    $data = rawmaterialUnits::find($id);
                         $data->User_id=Auth::id();
                         $data->Units_name=$request->name;
                         $data->save();
                         return redirect()->back()->with('message','Units Apdated Successfuly');
                    
                        }

}
