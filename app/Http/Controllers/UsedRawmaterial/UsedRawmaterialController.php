<?php

namespace App\Http\Controllers\UsedRawmaterial;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Rawmaterial;
use App\Models\UsedRawmaterial;


class UsedRawmaterialController extends Controller
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

    public function UsedRawmaterial(){

        $data = Rawmaterial::all();
        return view('UsedRawmaterial.UsedRawmaterial',compact('data') );

    }

    public function AddUsedRawmaterial(Request $request){
        
        $quantity = $request->quantity;
        $id = $request->id;

        $data=new UsedRawmaterial;
        $data->User_id=Auth::id();
        $data->raw_material_id=$id;
        $data->quantity= $quantity;
        $data->date=$request->date;
        $data->name=$request->name;
        $data->save();

        $db = DB::table('rawmaterials')
                    ->select('quantity')
                    ->where('id', '=', $id)
                    ->get();
                    $quantityInStock = $db[0]->quantity;
                    $quantityInStock -= $quantity;

         DB::table('rawmaterials')
                   ->where('id', $id)
                   ->update(['quantity' => $quantityInStock]);

        return redirect()->back()->with('message','New UsedRawmaterial Added Successfuly');
   
       }

       public function ListUsedRawmaterial(){

        $data = UsedRawmaterial::all();
        return view('UsedRawmaterial.ListUsedRawmaterial',compact('data') );

        }

        
    public function Demo(){

        return view('UsedRawmaterial.demo');

    }
        
}
