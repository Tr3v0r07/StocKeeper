

@extends('order-forms.orders')

    @section('setupCustomer')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            var i = 0;
                function addPanels() {
                $('#panels').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][row]" value="'+i+'">');
                $('#panels').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][category]" value="Panels">');
                $('#panels').append('<input name="order['+i+'][sn]" type="datalist" list="rolls" class="col-start-1  sm:col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="roll'+i+'"></select>');
                $('#panels').append('<input type="text" type="datalist" list="Panels" class="sm:col-start-3 sm:col-span-3 col-start-2 col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][desc]">');
                $('#panels').append('<input type="text" class="sm:col-start-6 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][ft]">');
                $('#panels').append('<input type="text" class="sm:col-start-7 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][in]">');
                $('#panels').append('<input type="text" class="sm:col-start-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][quantity]">');
                    ++i;
            };

                function addTrim() {
                $('#trim').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][row]" value="'+i+'">');
                $('#trim').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][category]" value="Trim">');
                $('#trim').append('<input name="order['+i+'][sn]" type="datalist" list="rolls" class="col-start-1 sm:col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="roll'+i+'"></select>');
                $('#trim').append('<input type="text" type="datalist" list="Trim" class="sm:col-start-3 col-start-2 sm:col-span-5 col-span-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][desc]">');
                $('#trim').append('<input type="text" class="sm:col-start-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][quantity]">');
                    ++i;
            };

                function addOther() {
                $('#other').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][row]" value="'+i+'">');
                $('#other').append('<input type="text" hidden class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][category]" value="Other">');
                $('#other').append('<input type="text" type="datalist" list="Inv" class="sm:col-start-3 col-start-2 sm:col-span-5 col-span-4  rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][desc]">');
                $('#other').append('<input type="text" class="sm:col-start-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="order['+i+'][quantity]">');
                    ++i;
            };



        </script>
        <form method="POST" action={{route('quoteOrder')}}  id="orderform">
            @csrf

            <div class="grid sm:grid-cols-9 grid-cols-6 gap-3">
                <label for="order_id" class="">Order ID</label>
                <label for="Customer Name" class=" sm:col-span-5 col-span-3 ">Customer Name</label>
                <button type="submit" class="m-auto sm:col-start-9 col-start-5 inline-flex float-right items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">submit</button>
                <input readonly id="id" class="mt-1 col-start-1 col-span-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="id" value={{ $orders->id }} />
                <select list="customer-list" id="customerName" placeholder="Customer" class="col-span-5 p-2 mt-1 rounded-md shadow-sm border-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  name="customerName"  >
                    <option id="customer-list"></option>
                        <div id="customer-selection">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                        @endforeach
                        </div>
                </select>
                <button type="button" onclick="addPanels()" class="m-auto sm:col-start-7 sm:col-span-1 col-span-2 col-start-1 inline-flex float-right items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest click:text-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add Panel</button>
                <button type="button" onclick="addTrim()" class="m-auto sm:col-start-8 sm:col-span-1 col-span-2 col-start-3 inline-flex float-right items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add Trim</button>
                <button type="button" onclick="addOther()" class="m-auto sm:col-start-9 sm:col-span-1 col-span-2 col-start-5 inline-flex float-right items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add Other</button>
            </div>

            <div id="panels" class="grid grid-cols-6 sm:grid-cols-9 gap-3 my-3">
            <div class="border-purple-400 border-t border-b col-span-9 pr-6">Panels</div>
                 <label for="" class="col-start-1 col-span-1 sm:col-span-2">Roll</label>
                 <label for="" class="col-start-2 col-span-2 sm:col-start-3 sm:col-span-3">Description</label>
                 <label for="" class="col-start-4 sm:col-start-6">Length:<br> ft</label>
                 <label for="" class="col-start-5 sm:col-start-7">in</label>
                 <label for="" class="col-start-6 sm:col-start-8">Quantity</label>
            <datalist id="rolls">
                        <option selected disabled class="">Select Roll</option>
                        @foreach ($rolls as $roll)
                        <option value="{{ $roll->sn }}">{{ $roll->color }} - {{ $roll->gauge }}</option>
                        @endforeach
                    </datalist>
                    <datalist id="cats">
                        <option value="Fastners">Fastners</option>
                        <option value="Boots">Boots</option>
                        <option value="Misc">Misc</option>
                    </datalist>
                    <datalist id="Panels">
                        @foreach ($panel as $item)
                        <option value="{{ $item->desc }}">{{ $item->desc }}</option>
                        @endforeach
                    </datalist>
                    <datalist id="Trim">
                        @foreach ($trim as $item)
                        <option value="{{ $item->desc }}">{{ $item->desc }}</option>
                        @endforeach
                    </datalist>
                    <datalist id="Inv">
                        @foreach ($inv as $item)
                        <option value="{{ $item->desc }}">{{ $item->desc }}</option>
                        @endforeach
                    </datalist>

            </div>
        <div id="trim" class="grid sm:grid-cols-9 grid-cols-6 gap-3">
            <div class="col-span-9 border-purple-400 border-t border-b my-3 pr-6">Trim</div>
            <label for="" class="col-start-1 sm:col-span-2 col-span-1 ">Roll</label>
            <label for="" class="sm:col-start-3 sm:col-span-5 col-span-4 ">Description</label>
            <label for="" class="sm:col-start-8 col-start-6">Quantity</label>

        </div>
        <div id="other" class="grid sm:grid-cols-9 grid-cols-6 gap-3">

            <div class="col-span-9 border-purple-400 border-t border-b my-3 pr-6">Other</div>
            <label for="" class="sm:col-start-3 sm:col-span-5 col-start-2 col-span-3">Description</label>
            <label for="" class="sm:col-start-8 col-start-6">Quantity</label>
        </div>
    </form>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>

    @endsection

