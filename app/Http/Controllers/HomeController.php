<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mgonjwa;
use App\Models\Address;
use App\Models\Partient;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if(Auth::user()){
            if(Auth::user()->role=='1'){
                 return view('layouts.adminpartients');
            }
            else{
               return view('master');

            }
        }
    //     return redirect()->back();

    // }



    public function form()
    {
        return view('layouts.form');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    // public function form3()
    // {
    //     return view('layouts.form3');
    // }
    public function getform(Request $request)
    {
     $partient=new mgonjwa;
     $partient->userid=Auth::id();
     $partient->firstname=$request->firstname;
     $partient->midlename=$request->midlename;
     $partient->lastname=$request->lastname;
     $partient->date=$request->date;
     $partient->gender=$request->gender;
     $partient->status=$request->status;
     $partient->illness=$request->illness;
     $partient->progress=$request->progress;
     $partient->motherfirstname=$request->motherfirstname;
     $partient->mothermidlename=$request->mothermidlename;
     $partient->motherlastname=$request->motherlastname;
     $partient->phone1=$request->phone1;
     $partient->phone2=$request->phone2;
     $partient->mkoa=$request->mkoa;
     $partient->wilaya=$request->wilaya;
     $partient->kata=$request->kata;
     $partient->kijiji=$request->kijiji;
     $partient->kitongoji=$request->kitongoji;
     $partient->save();

    //  $user->role=$request->role;
    return view('layouts.partients');

    }

    // public function getform2(Request $request)
    // {
    //  $mother=new mother;
    //  $mother->childid=Auth::id();
    //  $mother->firstname=$request->firstname;
    //  $mother->midlename=$request->midlename;
    //  $mother->lastname=$request->lastname;
    //  $mother->phone1=$request->phone1;
    //  $mother->phone2=$request->phone2;
    // //  $user->role=$request->role;
    //  $mother->save();
    //  return view('layouts.form3');
    // }

    // public function getform3(Request $request)
    // {
    //  $address=new address;
    //  $address->mkoa=$request->mkoa;
    //  $address->wilaya=$request->wilaya;
    //  $address->kata=$request->kata;
    //  $address->kijiji=$request->kijiji;
    //  $address->kitongoji=$request->kitongoji;
    //  $address->save();
    //  return view('home');
    // }

    public function getreport(){

        // $partient = mgonjwa::all();
        if(Auth::user()->role=='1'){
        $partient = DB::table('mgonjwas')->get(); 
        }
        else{
             $id = Auth::id();
            $partient = DB::table('mgonjwas')->where('userid', '=', $id)->get(); 
        }

        // Fetch all records
        $response['data'] = $partient;
        echo json_encode($response);
     }



    // public function add_seller()
    // {
    //     return view('layouts.seller');
    // }


    // public function add_item()
    // {
    //     $item = item::all();
    //     return view('layouts.item',compact('item') );
    // }
   

    // public function sells_report()
    // {
    //     return view('layouts.sells_report');
    // }


    // public function buyitem()
    // {
    //     $item = item::all();
    //     return view('layouts.buyitem',compact('item') );
    // }

    // public function sellitem()
    // {
    //     $item = item::all();
    //     return view('layouts.sellitem',compact('item') );
    // }


    // public function add_store(Request $request)
    // {
    //  $store=new store;
    //  $store->name=$request->name;
    //  $store->location=$request->location;
    //  $store->save();
    //   return redirect()->back()->with('massage','Store Added Successfuly');
    // }


    // public function addseller(Request $request)
    // {
    //  $user=new user;
    //  $user->name=$request->name;
    //  $user->email=$request->email;
    //  $user->password=$request->password;
    // //  $user->role=$request->role;
    //  $user->save();
    //  return redirect()->back()->with('massage','User Added Successfuly');
    // }


    //   public function buy_item(Request $request)
    // {

    //  $buy=new buy;
    //  $type = $request->type;
    //  $id = $request->id;
    //  $quantity = $request->quantity;

    //  if($type =='Carton'){
    //  $sum= 10 * $quantity;
    //  }
    //  else{
    //  $sum= 12 * $quantity;
    //  }  
    //  $data=item::find($id);

    //  $data->quantity= $data->quantity + $sum;
    //  $buy->name=$request->name;
    //  $buy->type=$type;
    //  $buy->quantity=$quantity;

    //  $buy->save();
    //  $data->save();
    //  return redirect()->back()->with('massage','Item Bought Successfuly');
    // }


    // public function additem(Request $request)
    // {
    //  $item=new item;
    //  $item->name=$request->name;
    //  $item->category=$request->category;
    //  $item->discripsion=$request->discripsion;

    //  $photo=$request->photo;
    //  $photoname=time().'.'.$photo->getClientoriginalExtension();
    //  $request->photo->move('itemimage',$photoname);
    //  $item->photo=$photoname;

    //  $item->price=$request->price;
    //  $item->save();
    //  return redirect()->back()->with('massage','Item Added Successfuly');
    // }

    // public function sell_item(Request $request)
    // {
    //  $sell=new sell;
    //  $type = $request->type;
    //  $id = $request->id;
    //  $quantity = $request->quantity;

    //  if($type =='unity'){
    //  $sum= 1 * $quantity;
    //  }
    //  else{
    //  $sum= 12 * $quantity;
    //  }  
    //  $data=item::find($id);

    //  $data->quantity= $data->quantity - $sum;
    //  $sell->name=$request->name;
    //  $sell->type=$type;
    //  $sell->quantity=$quantity;

    //  $sell->save();
    //  $data->save();
    //  return redirect()->back()->with('massage','Item sold Successfuly');
    // }

}
