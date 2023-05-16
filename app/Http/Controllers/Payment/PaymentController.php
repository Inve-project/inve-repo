<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Payment;


class PaymentController extends Controller
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

    public function Payment(){

        // $data = Payment::all();
        // return view('Payment.Payment',compact('data') );
        return view('Payment.Payment');

    }

    public function AddPayment(Request $request){
        $quantity = 0 ;
       $data=new Payment;
        $data->User_id=Auth::id();
        $data->name=$request->name;
        $data->amount=$request->amount;
        $data->date=$request->date;
        $data->save();
        return redirect()->back()->with('message','New Payment Added Successfuly');
   
       }

       public function ListPayment(){

        $data = Payment::all();
        return view('Payment.ListPayment',compact('data') );

        }
}
