<?php

namespace App\Http\Controllers\Reorder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Reorder;
use App\Models\Product;
use App\Models\Rawmaterial;

class ReorderController extends Controller
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
    
    public function Reorder(){
        $data = Product::all();
        return view('Reorder.Reorder',compact('data') );
    }

    public function Reordermaterial(){
        $data = Rawmaterial::all();
        return view('Reorder.Reordermaterial',compact('data') );
    }

    public function AddReorder(Request $request){
        $category = "Products";
        $status = "blink";

         $data=new Reorder;
         $data->User_id=Auth::id();
         $data->item_id=$request->id;
         $data->item_name=$request->name;
         $data->item_quantity=$request->quantity;
         $data->category=$category;
         $data->status=$status;
         $data->save();
         return redirect()->back()->with('message','Reorder Added Successfuly');
    
        }
        public function AddReordermaterial(Request $request){
            $category = "material";
            $status = "blink";
    
             $data=new Reorder;
             $data->User_id=Auth::id();
             $data->item_id=$request->id;
             $data->item_name=$request->name;
             $data->item_quantity=$request->quantity;
             $data->category=$category;
             $data->status=$status;
             $data->save();
             return redirect()->back()->with('message','Reorder Added Successfuly');
        
            }

        public function ListReorder(){

            $data = Reorder::all();
            return view('Reorder.ListReorder',compact('data') );

            }

        public function editReorder($id){

                    $Reorder = Reorder::find($id);
                    $data = Product::all();
                    return view('Reorder.editReorder',compact('Reorder','data') );
                    }

        public function editReordermaterial($id){

                        $Reorder = Reorder::find($id);
                        $data = Rawmaterial::all();
                        return view('Reorder.editReordermaterial',compact('Reorder','data') );
                        }

        public function updateReorder(Request $request, $id){

                    $data = Reorder::find($id);
                         $data->User_id=Auth::id();
                         $data->item_name=$request->name;
                         $data->item_quantity=$request->quantity;
                         $data->save();
                         return redirect()->back()->with('message','Reorder Updated Successfuly');
                        }

        public function updateReordermaterial(Request $request, $id){
                                $data = Reorder::find($id);
                                 $data->User_id=Auth::id();
                                 $data->item_name=$request->name;
                                 $data->item_quantity=$request->quantity;
                                 $data->save();
                                 return redirect()->back()->with('message','Reorder Updated Successfuly');
                                }
                        

         public function deleteReorder($id){

            $data = Reorder::find($id);
            $data->delete();
           return redirect()->back()->with('message','Reorder Deleted Successfuly');
            }       
}
