

@extends('inventory.inventory')

@section('newShipment')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var i = 0;
            function addItem() {
            $('#shipment').append('<input required autocomplete="false" type="datalist" list="inventory" name="ship['+i+'][desc]" type="text" class="col-start-1 col-span-5 border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">');
            $('#shipment').append('<input autocomplete="false" name="ship['+i+'][quantity]" type="text" class="col-start-6 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">');
                ++i;
        };
    </script>

    <form method="POST" action={{route('newShip')}}  id="orderform">
        @csrf

        <div class="grid grid-cols-7 gap-3">

            <button type="button" onclick="addItem()" class="mr-auto col-start-1 col-span-2 inline-flex float-right items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest click:text-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add Item</button>


        <div id="shipment" class="grid grid-cols-7 col-span-7 gap-3 my-3">
        <div class="border-purple-400 border-t border-b col-span-7 pr-6">New Shipment</div>
        <label for="" class="col-start-1 col-span-5">Description</label>
        <label for="" class="col-start-6 ">Quantity</label>
        </div>
        <button type="submit" class="mr-auto col-start-6 col-span-3 inline-flex float-right items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest click:text-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Submit</button>

        </div>
    </form>
        <datalist id="inventory">
            <option selected value="">Select Item Description</option>
        @foreach ($inventory as $item)
            <option value="{{ $item->desc }}">{{ $item->desc }}</option>
        @endforeach
    </datalist>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>

@endsection

