<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Order;




class OrderController extends Controller
{
    public function active()
    {
        $orders = DB::table('orders')->where('status', ['estimated','accepted','completed','invoiced'])->get();

        return view ('orders', compact('orders'));

    }

    public function estimated()
    {
        $orders = DB::table('orders')->where('status', 'estimated')->get();

        return view ('orders', compact('orders'));

    }

    public function accepted()
    {
        $orders = DB::table('orders')->where('status', 'accepted')->get();

        return view ('orders', compact('orders'));

    }

    public function completed()
    {
        $orders = DB::table('orders')->where('status', 'completed')->get();

        return view ('orders', compact('orders'));

    }

    public function invoiced()
    {
        $orders = DB::table('orders')->where('status', 'invoiced')->get();

        return view ('orders', compact('orders'));

    }

    public function delivered()
    {
        $orders = DB::table('orders')->where('status', 'delivered')->get();

        return view ('orders', compact('orders'));

    }

    public function delete($id)
    {
        $orders = DB::table('orders')->where('id', $id)->get();


        $customerName = str_replace(' ','',$order->cust_name);

        $tableName = $customerName.'_order_'.$orders->id;
        Schema::dropIfExists($tableName);

        DB::table('orders')->where('id', $id)->delete();
        return redirect()->back();


    }

    public function edit($id)
    {
        $orders = DB::table('orders')->where('id', $id)->get();

        return view ('orders', compact('orders'));

    }

    public function all_orders()
    {
        $orders = DB::table('orders')->get();

        return view ('all_orders', compact('orders'));

    }

    public function new_order()
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

        session()->forget('panels');
        session()->forget('trim');
        session()->forget('cart');
        session()->forget('roll');
        session()->forget('order');

        return view ('order-forms.setCustomer', compact('orders', 'customers'));
    }


    public function setCustomer(Request $request)
    {
            $order = array();
            $order = [
                'orderId' => $request->id,
                'customerName' => $request->customerName,
            ];

            session()->put('order', $order);
            return redirect(route('toPanels'));
    }

    public function toPanels()
    {
        if (!session()->exists('panels')) {
            $panelId=0;
        }
        else {
            $panelId = session()->get('panels');
            $panelkey = krsort($panelId);
            $panelId = array_key_last($panelId);

        }

        $inventory = DB::table('inventories')->where('category','Panels')->get();
        // dd($inventory);
        $rolls=DB::table('rolls')->get();

        $order=session()->get('order');
        $panels=session()->get('panels');
        $trim=session()->get('trim');
        $cart=session()->get('cart');

        $customer = DB::table('customers')
            ->where('name',$order['customerName'])->first();
            session()->put('customer', $customer);

            return view ('order-forms.panels', compact('panelId','inventory','order','rolls','panels','trim','customer','cart'));

    }

    public function addPanel(Request $request)
    {
        $request= $request->except('_token');
        $order = session()->get('order');
        $rolls = DB::table('rolls')->get();
        $sn = $request['sn'];
        $rollSn = $request['sn'];
        $remain = DB::table('rolls')->where('sn', $sn)->value('remaining');
        $id = DB::table('rolls')->where('sn', $sn)->value('id');
        $customer = DB::table('customers')
            ->where('name',$order['customerName'])->first();
        $inventory = Inventory::where('category', 'Panels')
        ->orderBy('category')->get();
        $currentRollColor = DB::table('rolls')->where('sn', $sn)->value('color');
        $currentRollGauge = DB::table('rolls')->where('sn', $sn)->value('gauge');
        $roll= session()->get('roll');
        $panels = session()->get('panels');
        $panelId = ++$request['id'];
        $trim= session()->get('trim');

        $remove = ((($request['ft'] * 12) + $request['in']) * $request['quantity']);
        $remain -= $remove;



        // dd($roll);
        $quantity = $request['quantity'];

        if (isset($roll[$id])){
            $roll[$id]['available'] -= $remove;
        }
        else {
            $roll[$id] = [
                'sn' => $request['sn'],
                'color' => $currentRollColor,
                'gauge' => $currentRollGauge,
                'available' => $remain
            ];
        }



        if(is_null($panels)) {

            $panels = array();

        }
        $panels[$panelId] = [
            'id' => $panelId,
            'sn' => $roll[$id]['sn'],
            'color' => $currentRollColor,
            'gauge' => $currentRollGauge,
            'desc' => $request['desc'],
            'ft'=> $request['ft'],
            'in' => $request['in'],
            'quantity' => $request['quantity'],
            'ppu' => $request['ppu']];


        session()->put('roll', $roll);
        session()->put('panels', $panels);
        return view('order-forms.panels', compact('roll','order','rolls','inventory','panels', 'panelId','customer'));
    }

    public function toTrim()
    {
        $order=session()->get('order');

        if (!session()->exists('panels')) {
            $trimId=0;
        }
        else {
            $trimId = session()->get('panels');
            $trimkey = krsort($trimId);
            $trimId = array_key_last($trimId);
        }
        $customer = DB::table('customers')
            ->where('name',$order['customerName'])->first();

        $inventory = DB::table('inventories')->where('category','Trim')->get();
        // dd($inventory);
        $rolls=DB::table('rolls')->get();

        $order=session()->get('order');
        $panels=session()->get('panels');
        $trim=session()->get('trim');


            return view ('order-forms.trim', compact('customer','inventory','order','rolls','panels','trim','trimId'));

    }

    public function addTrim(Request $request)
    {
        $request=$request->except('_token');
        $order = session()->get('order');
        $rolls = DB::table('rolls')->get();
        $sn = $request['sn'];
        $id = DB::table('rolls')->where('sn', $sn)->value('id');
        $remain = DB::table('rolls')->where('sn', $sn)->value('remaining');
        $inventory = DB::table('inventories')->where('category','Trim')->get();
        $currentRollColor = DB::table('rolls')->where('sn', $sn)->value('color');
        $currentRollGauge = DB::table('rolls')->where('sn', $sn)->value('gauge');
        $trimId = ++$request['id'];
        $roll= session()->get('roll');
        $trim = session()->get('trim');
        $panels = session()->get('panels');

        // dd($request['ppu']);



        if(is_null($trim)) {
            $trim = array();
            $trim[$trimId] = [
                    'id' => $trimId,
                    'sn' => $sn,
                    'color' => $currentRollColor,
                    'gauge' => $currentRollGauge,
                    'desc' => $request['desc'],
                    'ppu' => $request['ppu'],
                    'quantity' => $request['quantity'],

                ];

        }
        else {
            $trim[$trimId] = [
                'id' => $trimId,
                'sn' => $sn,
                'color' => $currentRollColor,
                'gauge' => $currentRollGauge,
                'desc' => $request['desc'],
                'quantity' => $request['quantity'],
                'ppu' => $request['ppu']
            ];
        }

        $customer = DB::table('customers')
        ->where('name',$order['customerName'])->first();

        session()->put('trim', $trim);

        return view('order-forms.trim', compact('roll','order','rolls','inventory','panels', 'trimId','trim', 'customer'));


    }

    public function toCart()
    {
        $order=session()->get('order');
        $panels=session()->get('panels');
        $trim=session()->get('trim');
        $cart=session()->get('cart');
        $inventory = DB::table('inventories')
            ->where('category','<>','Panels')
            ->where('category','<>','Trim')
            ->get();
        // dd($inventory);
        $rolls=DB::table('rolls')->get();
        $customer = DB::table('customers')
            ->where('name',$order['customerName'])->first();



            return view ('order-forms.order_form', compact('customer','inventory','order','rolls','panels','trim','cart'));

    }

    public function addItemToCart(Request $request)
    {
        $request=$request->except('_token');
        $order = session()->get('order');
        $inventory = DB::table('inventories')
            ->where('category','<>','Panels')
            ->where('category','<>','Trim')
            ->get();
        $roll= session()->get('roll');
        $trim = session()->get('trim');
        $cart = session()->get('cart');
        $panels = session()->get('panels');
        $id = $request['id'];
        // dd($inventory);

        $quantity = $request['quantity'];

        if(is_null($cart)) {
            $cart = array();
            $cart[$id] = [
                    'id' => $request['id'],
                    'category' => $request['category'],
                    'quantity' => $request['quantity'],
                    'available' => $request['available'],
                    'desc' => $request['desc'],
                    'ppu' => $request['ppu'],

                ];

        }
        else {
            $cart[$id] = [
                'id' => $request['id'],
                'category' => $request['category'],
                'quantity' => $request['quantity'],
                'available' => $request['available'],
                'desc' => $request['desc'],
                'ppu' => $request['ppu'],
        ];
        }
        session()->put('trim', $trim);
        session()->put('roll', $roll);
        session()->put('panels', $panels);
        session()->put('cart', $cart);
        $customer = DB::table('customers')
        ->where('name',$order['customerName'])->first();


        return view('order-forms.order_form', compact('roll','order','inventory','panels', 'trim','cart', 'customer'));


    }

    public function deletePanel(Request $request)
    {
        $panels=session()->get('panels');

        $panels[$request->id]['quantity']= $panels[$request->id]['quantity']-$request->quantity;

        session()->put('panels', $panels);

        return redirect(route('toPanels'));
    }
    public function deleteTrim(Request $request)
    {
        $trim=session()->get('trim');

        $trim[$request->id]['quantity']= $trim[$request->id]['quantity']-$request->quantity;

        session()->put('trim', $trim);

        return redirect(route('toTrim'));


    }
    public function deleteMisc(Request $request)
    {
        $cart=session()->get('cart');
        // dd($request->id);
        $cart[$request->id]['quantity']= $cart[$request->id]['quantity']-$request->quantity;

        session()->put('cart', $cart);

        return redirect(route('toCart'));


    }

    public function submitToQuote()
    {
        $order = session()->get('order');
        $panels = session()->get('panels');
        $cart = session()->get('cart');
        $trim = session()->get('trim');
        $customer = session()->get('customer');
        $row = 1;
        $ordermaker = array();
        foreach ($panels as $panel){
            $ordermaker[$row] = [
                'category' => 'Panels',
                'sn' => $panel['sn'],
                'itemId' => '',
                'color' => $panel['color'],
                'gauge' => $panel['gauge'],
                'desc' => $panel['desc'],
                'ft' => $panel['ft'],
                'in' => $panel['in'],
                'quantity' => $panel['quantity'],
                'ppu' => $panel['ppu'],
                'total' => $panel['quantity']*$panel['ppu']
            ];
            $row = ++$row;
        }
        foreach ($trim as $item){
            $ordermaker[$row] = [
                'category' => 'Trim',
                'sn' => $item['sn'],
                'itemId' => '',
                'color' => $item['color'],
                'gauge' => $item['gauge'],
                'desc' => $item['desc'],
                'ft' => '',
                'in' => '',
                'quantity' => $item['quantity'],
                'ppu' => $item['ppu'],
                'total' => $item['quantity']*$item['ppu']

            ];
            $row = ++$row;
        }
        
        foreach ($cart as $item){
            $ordermaker[$row] = [
                'category' => $item['category'],
                'sn' => '',
                'itemId' => $item['id'],
                'color' => '',
                'gauge' => '',
                'desc' => $item['desc'],
                'ft' => '',
                'in' => '',
                'quantity' => $item['quantity'],
                'ppu' => $item['ppu'],
                'total' => $item['quantity']*$item['ppu']

            ];
            $row = ++$row;
        }

        $customerName = str_replace(' ','',$order['customerName']);

        $tableName = $customerName.'_order_'.$order['orderId'];
        Schema::dropIfExists($tableName);

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('sn')->nullable();
            $table->string('itemId')->nullable();
            $table->string('color')->nullable();
            $table->string('gauge')->nullable();
            $table->string('desc');
            $table->string('ft')->nullable();
            $table->string('in')->nullable();
            $table->string('quantity');
            $table->double('ppu');
            $table->double('total');
            $table->timestamps();
        });

        foreach ($ordermaker as $line) {
            DB::table($tableName)->insert([$line]);
        }
        $order['cust_name']= $order['customerName'];
        unset($order['customerName']);
        unset($order['orderId']);

            DB::table('orders')->insert($order);


            $quote = DB::table($tableName)->get();

        return redirect(route('viewQuote'));
    }

    public function viewQuote()
    {
        $order = session()->get('order');
        $customerName = str_replace(' ','',$order['customerName']);
        $orderContents = DB::table($customerName.'_order_'.$order['orderId'])->get();
        $total = 0;
        foreach ($orderContents as $ppu){
            $total += ($ppu->ppu*$ppu->quantity);

        }

        return view('order-forms.quote',compact('orderContents', 'order', 'total'));

    }

    public function orderQuoted(){

        $tableName = $order['cust_name'].'_order_'.$order['order_id'];
        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('sn')->nullable();
            $table->string('itemId')->nullable();
            $table->string('color')->nullable();
            $table->string('gauge')->nullable();
            $table->string('desc');
            $table->string('ft')->nullable();
            $table->string('in')->nullable();
            $table->string('quantity');
            $table->double('ppu');
            $table->timestamps();
        });

    }

    public function updateOrderItem(Request $request) {

        $order=session()->get('order');
        $customerName = str_replace(' ','',$order['customerName']);
        $orderContents = DB::table($customerName.'_order_'.$order['orderId'])->where('id',$request->id)->update(['ppu' => $request->ppu]);
        $total = 0;
        $orderContents = DB::table($customerName.'_order_'.$order['orderId'])->get();

        foreach ($orderContents as $ppu){
            $total += ($ppu->ppu*$ppu->quantity);

        }

        return view('order-forms.quote',compact('orderContents', 'order','total'));


    }

    public function submitOrder()
    {
        $order=session()->get('order');
        $customerName = str_replace(' ','',$order['customerName']);
        $total = 0;
        $orderContents = DB::table($customerName.'_order_'.$order['orderId'])->get();

        foreach ($orderContents as $ppu){
            $total += ($ppu->ppu*$ppu->quantity);

        }
        return view('order-forms.final',compact('orderContents', 'order','total'));

    }

    public function clearSession(){
        session()->forget('panels');
        session()->forget('trim');
        session()->forget('cart');
        session()->forget('roll');
        session()->forget('order');

        return view('dashboard');
    }
}

