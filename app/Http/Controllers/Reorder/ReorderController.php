<?php

namespace App\Http\Controllers\Reorder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Reorder;
use App\Models\Product;
use App\Models\UserProduct;
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

    public function Reorderuserproduct(){

         $data = DB::table('user_products')
                    ->select('user_products.product_id','products.name','user_products.units')
                    ->join('products', 'user_products.product_id', '=', 'products.id')
                    ->get();
   
        return view('Reorder.Reorderuserproduct',compact('data') );
    }

    public function AddReorder(Request $request){

        $id = $request->id;
        $exists = Reorder::where('item_id', $id)->where('item_category','Products')->exists();
        if ($exists) {
            return redirect()->back()->with('message','Sorry The Item is Exist');
        } else {
            $product = Product::find($id);

            $category = "Products";
            $status = "blank";
    
             $data=new Reorder;
             $data->User_id=Auth::id();
             $data->item_id=$id;
             $data->item_name=$product->name;
             $data->item_quantity=$request->quantity;
             $data->item_category=$category;
             $data->status=$status;
             $data->save();
             return redirect()->back()->with('message','Reorder Added Successfuly');
        }
        }

        public function AddReorderuserproduct(Request $request){

            $id = $request->id;
            $exists = Reorder::where('item_id', $id)->where('item_category','User')->exists();
            if ($exists) {
                return redirect()->back()->with('message','Sorry The Item is Exist');
            } else {
                $product = product::find($id);
    
                $category = "User";
                $status = "blank";
        
                 $data=new Reorder;
                 $data->User_id=Auth::id();
                 $data->item_id=$id;
                 $data->item_name=$product->name;
                 $data->item_quantity=$request->quantity;
                 $data->item_category=$category;
                 $data->status=$status;
                 $data->save();
                 return redirect()->back()->with('message','Reorder Added Successfuly');
            }
            }

        public function AddReordermaterial(Request $request){
           
            $id = $request->id;
            $exists = Reorder::where('item_id', $id)->where('item_category','material')->exists();
            if ($exists) {
                return redirect()->back()->with('message','Sorry The Item is Exist');
            } else {
            $Rawmaterial = Rawmaterial::find($id);

            $category = "material";
            $status = "blank";
    
             $data=new Reorder;
             $data->User_id=Auth::id();
             $data->item_id=$id;
             $data->item_name=$Rawmaterial->name;
             $data->item_quantity=$request->quantity;
             $data->item_category=$category;
             $data->status=$status;
             $data->save();
             return redirect()->back()->with('message','Reorder Added Successfuly');
            }
            }

        public function ListReorder(){

            $data = Reorder::all();
            return view('Reorder.ListReorder',compact('data') );

            }

        public function editReorder($id){

                    $Reorder = Reorder::find($id);
                    $data = DB::table('user_products')
                                ->select('user_products.product_id','products.name','user_products.units')
                                ->join('products', 'user_products.product_id', '=', 'products.id')
                                ->get();
                    return view('Reorder.editReorder',compact('Reorder','data') );
                    }

        public function editReorderuserproduct($id){

                        $Reorder = Reorder::find($id);
                        $data = Product::all();
                        return view('Reorder.editReorderuserproduct',compact('Reorder','data') );
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
        public function updateReorderuserproduct(Request $request, $id){

                      $data = Reorder::find($id);
                        $data->User_id=Auth::id();
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
