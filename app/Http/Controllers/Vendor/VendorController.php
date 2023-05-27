<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;


class VendorController extends Controller
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
    
    public function Vendor(){
        return view('Vendor.Vendor');
    }

    public function AddVendor(Request $request){

         $data=new Vendor;
         $data->User_id=Auth::id();
         $data->name=$request->name;
         $data->save();
         return redirect()->back()->with('message','New Vendor Added Successfuly');
    
        }

        public function ListVendor(){

            $data = Vendor::all();
            return view('Vendor.ListVendor',compact('data') );

            }

         public function deleteVendor($id){

                $data = Vendor::find($id);
                $data->delete();
               return redirect()->back()->with('message','Vendor Deleted Successfuly');
                }

        public function editVendor($id){

                    $data = Vendor::find($id);
                    return view('Vendor.editVendor',compact('data') );
                    }

        public function updateVendor(Request $request, $id){

                    $data = Vendor::find($id);
                         $data->User_id=Auth::id();
                         $data->name=$request->name;
                         $data->save();
                         return redirect()->back()->with('message','Vendor Apdated Successfuly');
                    
                        }
}
