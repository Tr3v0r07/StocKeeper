<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Order;

class InventoryController extends Controller
{
    public function view(Request $request)
    {
        $curcat =$request->category;

        if ($curcat != "") {

            $inv = DB::table('inventories')->where('category', $curcat)->get();
        }    
        else {
            $inv = Inventory::all();
  
        }
    
        return view('inventory.view', compact('inv', 'curcat'));
    }

    
    public function new()
    {
    
        return view('inventory.new_inventory');
    }

    public function store(Request $request)
    {   
        $add =$request->except('_token');
        DB::table('inventories')->insert($add);

        return redirect()->back();
    }

    public function newroll()
    {
        $colors = DB::table('colors')->get();
        $rolls = DB::table('rolls')->where("remaining", '>', 0)->get();

        return view('inventory.newroll', compact('colors', 'rolls'));
    }

    public function storeroll(Request $request)
    {
        
        $new = $request->except('_token');
        $new['length'] = 12 * $new['length'];
        $new['remaining'] = $new['length'];


        DB::table('rolls')->insert($new);

        return redirect()->back();
    }

    
}
