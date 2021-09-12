

@extends('order-forms.orders')

@section('setupCustomer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var i = 0;
            function addItem() {
            $('#panels').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][row]" value="'+i+'">');
            $('#panels').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][category]" value="Panels">');
            $('#panels').append('<input name="order['+i+'][sn]" type="datalist" list="rolls" class="col-start-1 col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="roll'+i+'"></select>');
            $('#panels').append('<input type="text" type="datalist" list="Panels" class="col-start-3 col-span-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][desc]">');
            $('#panels').append('<input type="text" class="col-start-6 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][ft]">');
            $('#panels').append('<input type="text" class="col-start-7 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][in]">');
            $('#panels').append('<input type="text" class="col-start-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][quantity]">');
                ++i;
        };
    </script>

    <form method="POST" action={{route('newShip')}}  id="orderform">
        @csrf

        <div class="grid grid-cols-9 gap-3">

            <button type="button" onclick="addPanels()" class="m-auto col-start-7 inline-flex float-right items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest click:text-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add Panel</button>
        </div>

        <div id="panels" class="grid grid-cols-9 gap-3 my-3">
        <div class="border-purple-400 border-t border-b col-span-9 pr-6">New Shipment</div>
             <label for="" class="col-start-3 col-span-3">Description</label>
             <label for="" class="col-start-6 ">Quantity</label>
        <datalist id="rolls">
                    <option selected disabled class="">Select Roll</option>
                    @foreach ($rolls as $roll)
                    <option value="{{ $roll->sn }}">{{ $roll->color }} - {{ $roll->gauge }}</option>
                    @endforeach
                </datalist>


        </div>
</form>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>

@endsection

