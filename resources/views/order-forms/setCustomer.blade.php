@extends('order-forms.new-order')

@section('setCustomer')
<form method="POST" action={{route('setCustomer')}}  id="orderform">
    @csrf
    <div class="grid grid-cols-4 gap-3">
        <label for="order_id" class="col-start-1">Order ID</label>
        <label for="Customer Name" class="col-span-2 col-start-2">Customer Name</label>
        <br>
        <input readonly id="id" class="mt-1 col-start-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="id" value={{ $orders->id }} />
        <x-input list="customer-list" id="customerName" placeholder="Customer" class="col-span-2 col-start-2 p-2 mt-1 rounded-md shadow-sm border-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="datalist" name="customerName"  />
        <datalist id="customer-list">
            @foreach ($customers as $customer)
                <option value="{{ $customer->name }}">{{ $customer->name }}</option>
            @endforeach
        </datalist>
        <x-button type="submit" class="m-auto col-start-4">Start New Order</x-button>
    </div>
</form>
@endsection

