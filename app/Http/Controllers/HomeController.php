<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserProduct;
use App\Models\SellProduct;
use App\Models\Rawmaterial;
use App\Models\Reorder;

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

    public function dashboard()
    {
        $data = product::all();
        $user = DB::table('user_products')
                        ->select('products.name','user_products.quantity','user_products.units')
                       ->join('products', 'user_products.product_id', '=', 'products.id')
                       ->get();
        $rawmaterial = Rawmaterial::all();
        $amount = DB::table('sell_products')
                      ->select(DB::raw('SUM(amount) AS amount'))
                      ->get();

        //  $reorder = DB::table('products','reorders')
        //              ->select('status')
        //              ->where('products.id', '=', 'reorders.item_id')
        //              ->and('products.name', '=', 'reorders.item_name')
        //              ->and('products.quantity', '<', 'reorders.item_quantity')
        //              ->get();



        return view('dashboard',compact('data','rawmaterial','amount','user') );
    }
 

}
