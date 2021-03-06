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

        $customers = DB::table('customers')->paginate(25);

        return view('customers.search', compact('customers'));

    }

    public function viewCustomer($id)
    {

        $customer = Customer::where('id',$id)->first();

        $orders = Order::where('cust_name', $customer->name)->paginate(10);

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
        if(isset($customer['individual'])){
            if($customer['individual']== 'on'){
                $customer['individual']= '1';
            }
        }
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

        return redirect(route('customers'));

    }

    public function edit(Request $request)
    {

        $customer=$request->except('_token');
            if(!isset($customer['individual'])){
                $customer['individual'] = 0;
            }

        DB::table('customers')->where('id',$customer['id'])->update([
            'name' => $customer['name'],
            'individual' => $customer['individual'],
            'contact' => $customer['contact'],
            'phone' => $customer['phone'],
            'email' => $customer['email'],
            'street_1' => $customer['street_1'],
            'street_2' => $customer['street_2'],
            'city' => $customer['city'],
            'state' => $customer['state'],
            'zip' => $customer['zip']
        ]);
        $customers = DB::table('customers')->get();

        return redirect()->route('customers');
    }
}
