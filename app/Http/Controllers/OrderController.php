<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Roll;




class OrderController extends Controller
{


    public function view($status)
    {


        $orders = DB::table('orders')->where('status', $status)->get();

        return view ('order-forms.orderquery', compact('orders'));

    }

    public function viewOrder($id)
    {
        session()->forget('order');
        $orders = DB::table('orders')->where('id', $id)->first();
        // dd($id);
        $tableName = $orders->cust_name.'/'.$orders->id;

        $order = DB::table($tableName)->get();
        $customer = DB::table('customers')->where('name',$orders->cust_name)->first();
        $sub=0;
        $orderid = $orders->id;
        foreach ($order as $row){
            $total = $row->ppu*$row->quantity;
            if ($row->category == 'Panels'){
                $length = $row->ft + ($row->in/12);
                $total = $length*$total;
            }
        $sub += $total;
        }
        session()->put('order', $orders);
        $sn = DB::table($tableName)->select('sn')->distinct()->get();


        return view ('order-forms.view', compact('order','customer','total','orderid','sub','orders','sn'));

    }

    public function accept(Request $request)
    {
        $request = $request->except('_token');
        $orders = session()->get('order');
        $tableName = $orders->cust_name.'/'.$orders->id;

        $sn = DB::table($tableName)->select('sn')->where('sn','!=','')->distinct()->get();

        $i = 0;
            foreach ($sn as $new){
                $num[$i] = $new->sn;
                ++$i;
            }
        // dd($sn);

        $rolls = DB::table('rolls')->where('sn', $num)->get();

        foreach ($rolls as $roll){
            $remove = (($request['tft'][$roll->sn]*12)+$request['tin'][$roll->sn])+(($request['wft'][$roll->sn]*12)+$request['win'][$roll->sn]);
            $remaining = $roll->remaining - $remove;
            DB::table('rolls')->where('sn',$roll->sn)->update(['remaining' => $remaining]);
        }

        $orders->status = 'Completed';

        session()->put('order', $orders);
        DB::table('orders')->where('id', $orders->id)->update(['status'=> $orders->status]);

        return redirect()->route('viewOrder', ['id' => $orders->id]);

    }


    public function advance($status)
    {
        $order = session()->get('order');
        // dd($order);

        DB::table('orders')->where('id', $order->id)->update(['status'=> $status]);
        $orders = DB::table('orders')->where('id', $order->id)->first();
        session()->put('orders', $orders);
        $tableName = $orders->cust_name.'/'.$orders->id;
        $sn = DB::table($tableName)->select('sn')->where('sn','!=','')->where('category','Panels')->distinct()->get();

        // dd($sn);

            if ($status == 'Accepted'){
                foreach ($sn as $num){
                    if (!isset($ft)){
                        $ft = DB::table($tableName)->where('sn',$num->sn)->sum('ft');
                    }
                    else {
                        $ft += DB::table($tableName)->where('sn',$num->sn)->sum('ft');

                    }
                    if (!isset($in)){
                        $in = DB::table($tableName)->where('sn',$num->sn)->sum('in');
                    }
                    else {
                        $in += DB::table($tableName)->where('sn',$num->sn)->sum('in');

                    }

                    $remove = ($ft *12)+$in;
                    $roll = DB::table('rolls')->where('sn', $num->sn)->first();
                    // dd(is_object($roll));
                    $remaining = $roll->remaining;
                    // dd($remaining);
                    $left = $remaining - $remove;
                    DB::table('rolls')->where('sn', $num->sn)->update(['remaining' => $left]);

              }
            }
        return redirect()->route('viewOrder', ['id' => $orders->id]);
    }

    public function all()
    {
        $orders = DB::table('orders')->get();

        return view ('order-forms.orderquery', compact('orders'));
    }


    // public function editOrder($id)
    // {
    //     $order = DB::table('orders')->where('id',$id)->get();

    //     return view ('order-forms.orders', compact('order'));
    // }

    public function newOrder()
    {

        $orders = DB::table('orders')
            ->orderBy('id','desc')
            ->first();
        $customers = Customer::all();

        if(is_null($orders)) {
            $orders = new Order;

            $orders->id = 1000;
        }
        ++$orders->id;

        $rolls=DB::table('rolls')->get();
        $inv=DB::table('inventories')
                    ->where('category','Fastners')
                    ->orWhere('category','Boots')
                    ->orWhere('category','Misc')
                    ->get();
        $panel=DB::table('inventories')->where('category','Panels')->get();
        $trim=DB::table('inventories')->where('category','Trim')->get();


        return view ('order-forms.setCustomer', compact('orders', 'customers','rolls', 'inv','panel','trim'));

    }

    public function quoteOrder(Request $request)
    {
        // dd($request);
        $request=$request->except('_token');
        $customerName=$request['customerName'];
        $orderid=$request['id'];

        Schema::dropIfExists($customerName.'/'.$orderid);
        Schema::create($customerName.'/'.$orderid , function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->string('category')->nullable();
            $table->string('sn')->nullable();
            $table->string('color')->nullable();
            $table->string('gauge')->nullable();
            $table->string('desc')->nullable();
            $table->integer('ft')->nullable()->default(0);
            $table->integer('in')->nullable()->default(0);
            $table->integer('quantity')->nullable();
            $table->float('ppu')->nullable();
            $table->float('total')->nullable();
        });
        ksort($request['order']);
        $table = $request['order'];
        $order = array();

        foreach ($table as $row) {

            if (isset($row['sn'])){
                $color = DB::table('rolls')->where('sn', $row['sn'])->value('color');
                $gauge = DB::table('rolls')->where('sn', $row['sn'])->value('gauge');
            }

            $inv = DB::table('inventories')->where('desc', $row['desc'])->value('ppu');

            if($row['category'] == 'Panels'){
                $order[$row['row']]['id'] = $row['row'];
                $order[$row['row']]['category'] = 'Panels' ;
                $order[$row['row']]['sn'] = $row['sn'];
                $order[$row['row']]['color'] = $color;
                $order[$row['row']]['gauge'] = $gauge;
                $order[$row['row']]['desc'] = $row['desc'];
                $order[$row['row']]['ft'] = $row['ft'];
                $order[$row['row']]['in'] = $row['in'];
                $order[$row['row']]['quantity'] = $row['quantity'];
                $order[$row['row']]['ppu'] = $inv;
                $order[$row['row']]['total'] = '0';
            }
            if($row['category'] == 'Trim'){
                $order[$row['row']]['id'] = $row['row'];
                $order[$row['row']]['category'] = 'Trim' ;
                $order[$row['row']]['sn'] = $row['sn'];
                $order[$row['row']]['color'] = $color;
                $order[$row['row']]['gauge'] = $gauge;
                $order[$row['row']]['desc'] = $row['desc'];
                $order[$row['row']]['ft'] = '0';
                $order[$row['row']]['in'] = '0';
                $order[$row['row']]['quantity'] = $row['quantity'];
                $order[$row['row']]['ppu'] = $inv;
                $order[$row['row']]['total'] = '0';
            }
            if($row['category'] == 'Other'){
                $category=DB::table('inventories')->where('desc',$row['desc'])->value('category');
                $order[$row['row']]['id'] = $row['row'];
                $order[$row['row']]['category'] = $category;
                $order[$row['row']]['sn'] = '';
                $order[$row['row']]['color'] = '';
                $order[$row['row']]['gauge'] = '';
                $order[$row['row']]['desc'] = $row['desc'];
                $order[$row['row']]['ft'] = '0';
                $order[$row['row']]['in'] = '0';
                $order[$row['row']]['quantity'] = $row['quantity'];
                $order[$row['row']]['ppu'] = $inv;
                $order[$row['row']]['total'] = '0';
            }
        }
        // dd($order);
        DB::table($customerName.'/'.$orderid)->insert($order);
        DB::table('orders')->insertOrIgnore([
            'id' => $orderid,
            'cust_name' => $customerName,
            'status' => 'Started'
        ]);
        $customer = DB::table('customers')->where('name', $customerName)->first();
        $panels = DB::table($customerName.'/'.$orderid)->where('category','Panels')->get();
        $trim = DB::table($customerName.'/'.$orderid)->where('category','Trim')->get();
        $other = DB::table($customerName.'/'.$orderid)
                        ->where('category','!=','Panels')
                        ->where('category','!=','Trim')
                        ->get();

        session()->put('customer', $customer);
        session()->put('order', $orderid);

        return view('order-forms.adjustQuote',compact('customer','order','panels','trim','other','orderid'));

    }

    public function totalQuote(Request $request)
    {
        $request=$request->except('_token');

        $customer = session()->get('customer');
        $orderid = session()->get('order');
        $tableName = $customer->name.'/'.$orderid;
        $order = DB::table($tableName)->get();
        foreach ($request as $line)
        {
            // dd($request);
            $i = $line['id'];

            $order[$i]->ppu = $line['ppu'];

            DB::table($tableName)->updateOrInsert(['id' =>$line['id']],['ppu' => $line['ppu']]);
        }
        $sub = 0;
        foreach ($order as $row){
            $total = $row->ppu*$row->quantity;
            if ($row->category == 'Panels'){

                $length = $row->ft + ($row->in/12);
                $total = $length*$total;

            }

            DB::table($tableName)->updateOrInsert(['id' =>$row->id],['total' => $total]);
            $sub += $total;
        }
            DB::table('orders')->where('id',$orderid)->update(['status' => 'Estimated']);
            // $order = DB::table($tableName)->get();
            return view('order-forms.view', compact('order','customer','orderid','sub'));
    }


}
