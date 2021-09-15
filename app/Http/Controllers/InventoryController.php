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

            $inv = DB::table('inventories')->orderBy('category','asc')->where('category', $curcat)->paginate(25);
        }
        else {
            $inv = DB::table('inventories')->orderBy('category','asc')->paginate(25);

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

        $count = DB::table('rolls')->where("remaining", '>', 0)->count();

        return view('inventory.newroll', compact('colors', 'rolls','count'));
    }

    public function storeroll(Request $request)
    {

        $new = $request->except('_token');
        $new['length'] = 12 * $new['length'];
        $new['remaining'] = $new['length'];


        DB::table('rolls')->insert($new);

        return redirect()->back();
    }

    public function newShipment()
    {
        $categories = DB::table('inventories')->select('category')->distinct()->get();
        $inventory = DB::table('inventories')
                            ->select('desc')
                            ->where('category','!=','Panels')
                            ->where('category','!=','Trim')
                            ->distinct()
                            ->get();
        // dd($categories);

        return view('inventory.newShipment',compact('categories','inventory'));
    }

    public function newShip(Request $request)
    {
        foreach ($request['ship'] as $row)
        {   $quant = DB::table('inventories')->where('desc',$row['desc'])->first();
            $quant->quantity += $row['quantity'];
            DB::table('inventories')->where('desc',$row['desc'])->update(['quantity' => $quant->quantity]);
        }



        return redirect('inventory/');
    }

}
