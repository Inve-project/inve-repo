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
use Carbon\Carbon;

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
        //         product
        $reorders = DB::table('products')
                  ->join('reorders', 'products.id', '=', 'reorders.item_id')
                  ->where('reorders.item_category', '=', 'Products')
                  ->get();
    
       foreach ($reorders as $reorder) {
          $quantity1 = $reorder->quantity; 
          $quantity2 = $reorder->item_quantity; 
        
         if ($quantity1 <= $quantity2) {
            Reorder::where('id', $reorder->id)           
                    ->where('status', 'blank')
                    ->update(['status' => 'blink']);
        }else{
            Reorder::where('id', $reorder->id)           
            ->where('status', 'blink')
            ->update(['status' => 'blank']);
        }
    }
        //         Raw materials
    $reorders1 = DB::table('rawmaterials')
                  ->join('reorders', 'rawmaterials.id', '=', 'reorders.item_id')
                  ->where('reorders.item_category', '=', 'material')
                  ->get();
    
       foreach ($reorders1 as $reorder) {
          $quantity1 = $reorder->quantity; 
          $quantity2 = $reorder->item_quantity; 
        
         if ($quantity1 <= $quantity2) {
            Reorder::where('id', $reorder->id)           
                    ->where('status', 'blank')
                    ->update(['status' => 'blink']);
        }else{
            Reorder::where('id', $reorder->id)           
            ->where('status', 'blink')
            ->update(['status' => 'blank']);
        }
    }

        //         User product
            $reorders2 = DB::table('user_products')
            ->join('reorders', 'user_products.product_id', '=', 'reorders.item_id')
            ->where('reorders.item_category', '=', 'User')
            ->get();

        foreach ($reorders2 as $reorder) {
        $quantity1 = $reorder->quantity; 
        $quantity2 = $reorder->item_quantity; 

        if ($quantity1 <= $quantity2) {
        Reorder::where('id', $reorder->id)           
                ->where('status', 'blank')
                ->update(['status' => 'blink']);
        }else{
        Reorder::where('id', $reorder->id)           
        ->where('status', 'blink')
        ->update(['status' => 'blank']);
        }
}

        $data = DB::table('products')
                      ->join('reorders', 'products.id', '=', 'reorders.item_id')
                      ->where('reorders.item_category', '=', 'Products')
                      ->get();
        $user = DB::table('user_products')
                     ->join('reorders', 'user_products.product_id', '=', 'reorders.item_id')
                     ->where('reorders.item_category', '=', 'User')
                     ->get();
        $rawmaterial = DB::table('rawmaterials')
                       ->join('reorders', 'rawmaterials.id', '=', 'reorders.item_id')
                       ->where('reorders.item_category', '=', 'material')
                       ->get();
                       
      $currentDate = Carbon::now()->toDateString();

             $todayData = DB::table('sell_products')
                        ->select(DB::raw('SUM(amount) AS amount'))
                        ->whereDate('date', $currentDate)
                        ->get();

             $thisWeekData = DB::table('sell_products')
                        ->select(DB::raw('WEEK(date) AS week'), DB::raw('SUM(amount) AS amount'))
                        ->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->groupBy('week')
                        ->orderBy('week', 'desc')
                        ->limit(1)
                        ->get();

            $thisMonthData = DB::table('sell_products')
                        ->select(DB::raw('MONTH(date) AS month'), DB::raw('SUM(amount) AS amount'))
                        ->whereMonth('date', Carbon::now()->month)
                        ->groupBy('month')
                        ->orderBy('month', 'desc')
                        ->limit(1)
                        ->get();
                        

        return view('dashboard',compact('data','user','rawmaterial','todayData','thisWeekData','thisMonthData') );
    }
 

}
