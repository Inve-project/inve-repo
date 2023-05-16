<?php

namespace App\Http\Controllers\Rawmaterial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RawmaterialCategory;

class RawmaterialCategoryController extends Controller
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
    
    public function RawmaterialCategory(){
        return view('RawmaterialCategory.RawmaterialCategory');
    }

    public function AddRawmaterialCategory(Request $request){

        $data=new rawmaterialCategory;
         $data->User_id=Auth::id();
         $data->Category_name=$request->name;
         $data->save();
         return redirect()->back()->with('message','New Category Added Successfuly');
    
        }

        public function ListRawmaterialCategory(){

            $data = rawmaterialCategory::all();
            return view('RawmaterialCategory.ListRawmaterialCategory',compact('data') );

            }

         public function deleteRawmaterialCategory($id){

                $data = rawmaterialCategory::find($id);
                $data->delete();
               return redirect()->back()->with('message','Category Deleted Successfuly');
                }

        public function editRawmaterialCategory($id){

                    $data = rawmaterialCategory::find($id);
                    return view('RawmaterialCategory.editRawmaterialCategory',compact('data') );
                    }

        public function updateRawmaterialCategory(Request $request, $id){

                    $data = rawmaterialCategory::find($id);
                         $data->User_id=Auth::id();
                         $data->Category_name=$request->name;
                         $data->save();
                         return redirect()->back()->with('message','Category Apdated Successfuly');
                    
                        }

}
