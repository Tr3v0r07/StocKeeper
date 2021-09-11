<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Order;



class CustomerController extends Controller
{
    public function all()
    {

        $customers = DB::table('customers')->get();

        return view('customers.search', compact('customers'));

    }

    public function viewCustomer($id)
    {

        $customer = Customer::where('id',$id)->first();

        $orders = Order::where('cust_name', $customer->name)->get('id','status');

        return view('customers.view', compact('customer','orders'));

    }


    public function new()
    {

        $customers = DB::table('customers')->get();

        $states= DB::table('us_states')->get();

        return view('customers.new', compact('customers','states'));

    }

    public function add(Request $request)
    {

        $customer=$request->except('_token');


        DB::table('customers')->insert($customer);
        $customers = DB::table('customers')->get();

        return view('customers.search', compact('customers'));

    }

    public function alter($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();

        $states= DB::table('us_states')->get();

        return view('customers.edit', compact('customer', 'states'));
    }

    public function delete($id)
    {
        $customer = DB::table('customers')->where('id', $id)->delete();

        return redirect()->back();

    }
}
