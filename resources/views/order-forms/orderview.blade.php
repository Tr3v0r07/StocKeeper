
{{-- {{ dd($order) }} --}}
<div class="border-purple-400 border-2 rounded m-auto p-2 w-full">

    <div class="grid grid-cols-8">
        <div class="inline-block col-span-2 col-start-1 max-w-max border-purple-400 border-r pr-2">
            <div class="text-lg font-bold block">Current Order</div>
            <div class="row-start-2 col-span-9 whitespace-nowrap">{{  $order['customerName']  }} </div>
            <div class="row-start-3 col-span-9 whitespace-nowrap">{{ $customer->street_1 }}, {{  $customer->street_2  }}</div>
            <div class="row-start-4 col-span-9 whitespace-nowrap">{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
            <div class="row-start-5 pb-2 col-span-9 whitespace-nowrap">{{ $customer->phone }}</div>
            <div class="pb-2 row-start-6 col-span-9"> <strong>Order #:</strong> {{ $order['orderId'] }}</div>
        </div>

        <div class="inline-block col-start-6 max-w-max border-purple-400 border-l pl-2">
            <div class="">
                <div class="pb-2 text-lg whitespace-nowrap font-bold">Guy Metal Shop</div>
                <div class=" whitespace-nowrap">397 Hwy 25 N</div>
                <div class="pb-2 whitespace-nowrap">Greenbrier, AR 72058</div>
            </div>
        </div>
        <div class="col-start-8 inline w-full place-items-end">
            <div class="pb-2 float-right whitespace-nowrap">{{ date('m/d/Y') }}</div>
            <div class=" noprint float-right inline-flex items-center mt-2 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2" class="my-2"><a href="{{ route('submitToQuote') }}">Submit</a></div>

        </div>
    </div>
    {{-- Display section for panel orders --}}
@if (isset($panels))
    @if (!is_null($panels))
        <div class="border-purple-400 border-t border-b  pr-6"><h2 class="inline text-lg">Panels</h2><svg class="inline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
        <div id="panelWindow" class="">
            <div class="grid gap-3 grid-cols-10 font-bold py-1">
                <div class="col-start-1 col-span-3 my-auto">Roll Number - Color - Gauge</div>
                <div class="col-start-4 col-span-2 my-auto">Item Description</div>
                <div class="col-start-6  my-auto">Length (ft)</div>
                <div class="col-start-7 my-auto">(in)</div>
                <div class="col-start-8 my-auto">Quantity</div>
                <div class="col-start-9 my-auto">Remove</div>
                <div class="col-start-10 my-auto"></div>

            </div>
            @foreach ($panels as $panel)
                <form action="{{ route('deleteOrderItem') }}" method="post">
                    @csrf
                    <div class="grid gap-3 grid-cols-10 border-purple-200 border-b py-1">
                        <input hidden readonly type="text" value="{{ $panel['id'] }}">
                        <div class="col-start-1 col-span-3 my-auto">{{ $panel['sn'] }} - {{ $panel['color'] }} {{ $panel['gauge'] }} Gauge</div>
                        <div class="col-start-4 col-span-2 my-auto">{{ $panel['desc'] }}</div>
                        <div class="col-start-6  my-auto">{{ $panel['ft'] }}'</div>
                        <div class="col-start-7 my-auto">{{ $panel['in'] }}"</div>
                        <div class="col-start-8 my-auto">{{ $panel['quantity'] }}</div>
                        <div class="col-start-9 my-auto"><input id="remove" class=" w-3/4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="quantity"  /></div>
                        <div class="col-start-10 my-auto"><x-button class="noprint " href="">Remove</x-button></div>
                    </div>
                </form>
            @endforeach
        </div>
        @endif
        @endif

{{-- Dipsplay section for trim pieces --}}
@if (isset($trim))
    @if (!is_null($trim))
        <div class="border-purple-400 border-t border-b  pr-6"><h2 class="inline text-lg">Trim</h2><svg class="inline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
            <div id="panelWindow" class="">
                <div class="grid gap-3 grid-cols-10 font-bold py-1">
                    <div class="col-start-1 col-span-3 my-auto">Roll Number - Color - Gauge</div>
                    <div class="col-start-4 col-span-4 my-auto">Item Description</div>
                    <div class="col-start-8 my-auto">Quantity</div>
                    <div class="col-start-9 my-auto">Remove</div>
                    <div class="col-start-10 my-auto"></div>

                </div>
                @foreach ($trim as $piece)
                <form action="{{ route('deleteOrderItem') }}" method="post">
                    @csrf
                    <div class="grid gap-3 grid-cols-10 border-purple-200 border-b py-1">
                        <input hidden readonly type="text" value="{{ $piece['id'] }}">
                        <div class="col-start-1 col-span-3 my-auto">{{ $piece['sn'] }} - {{ $piece['color'] }} - {{ $piece['gauge'] }} Gauge</div>
                        <div class="col-start-4 col-span-4 my-auto">{{ $piece['desc'] }}</div>
                        <div class="col-start-8 my-auto">{{ $piece['quantity'] }}</div>
                        <div class="col-start-9 my-auto"><input id="remove" class=" w-3/4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="quantity"  /></div>
                        <div class="col-start-10 my-auto"><x-button class="noprint"  href="">Remove</x-button></div>
                    </div>
                </form>
                @endforeach
            </div>
    @endif
@endif

{{-- Display section for all other items --}}

@if (isset($cart))
    @if (!is_null($cart))
        <div class="border-purple-400 border-t border-b  pr-6"><h2 class="inline text-lg">Other</h2><svg class="inline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
        <div id="panelWindow" class="p-2">
            <div class="grid gap-3 grid-cols-10 font-bold py-1">
                <div class="col-start-1 col-span-3 my-auto">Category</div>
                <div class="col-start-4 col-span-4 my-auto">Item Description</div>
                <div class="col-start-8 my-auto">Quantity</div>
                <div class="col-start-9 my-auto">Remove</div>
                <div class="col-start-10 my-auto"></div>

            </div>
            @foreach ($cart as $piece)
            <form action="{{ route('deleteOrderItem') }}" method="post">
                @csrf
                <div class="grid gap-3 grid-cols-10 border-purple-200 border-b py-1">
                    <input hidden readonly type="text" value="{{ $piece['id'] }}">
                    <div class="col-start-1 col-span-3 my-auto">{{ $piece['category'] }}</div>
                    <div class="col-start-4 col-span-2 my-auto">{{ $piece['desc'] }}</div>
                    <div class="col-start-8 my-auto">{{ $piece['quantity'] }}</div>
                    <div class="col-start-9 my-auto"><input id="remove" class=" w-3/4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="quantity"  /></div>
                    <div class="col-start-10 my-auto"><x-button class="noprint" href="">Remove</x-button></div>
                </div>
            </form>
            @endforeach
        </div>
    @endif
    @endif

</div>
