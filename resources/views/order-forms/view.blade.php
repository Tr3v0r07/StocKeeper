@extends('order-forms.orders')


@section('viewOrder')

<style>
    .modal {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
</style>

<div class="border-purple-400 border-2 rounded m-auto p-2 w-full">
        <div class="grid grid-cols-8">
            <div class="inline-block col-span-2 col-start-1 max-w-max border-purple-400 border-r pr-2">
                <div class="text-lg font-bold block">Current Order</div>
                <div class="row-start-2 col-span-9 whitespace-nowrap">{{  $customer->name  }} </div>
                <div class="row-start-3 col-span-9 whitespace-nowrap">{{ $customer->street_1 }}, {{  $customer->street_2  }}</div>
                <div class="row-start-4 col-span-9 whitespace-nowrap">{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
                <div class="row-start-5 pb-2 col-span-9 whitespace-nowrap">{{ $customer->phone }}</div>
                <div class="pb-2 row-start-6 col-span-9"> <strong>Order #:</strong> {{ $orderid }}</div>
            </div>

            <div class="inline-block col-start-6 max-w-max border-purple-400 border-l pl-2">
                <div class="">
                    <div class="pb-2 text-lg whitespace-nowrap font-bold">Guy Metal Shop</div>
                    <div class=" whitespace-nowrap">397 Hwy 25 N</div>
                    <div class=" whitespace-nowrap">Greenbrier, AR 72058</div>
                    <div class="pb-2 whitespace-nowrap">(501)581-8070</div>
                </div>
            </div>
            <div class="col-start-8 inline w-full place-items-end">
                    <div class="pb-2 float-right whitespace-nowrap">{{ date('m/d/Y') }}</div>
                    <div class=" noprint w-3/4 float-right inline-flex items-center mt-2 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2"><a class="m-auto" href=""> Edit </a></div>
                @admin
                    <div class=" noprint w-3/4 float-right inline-flex items-center mt-1 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2"><a class="m-auto" href=""> Cancel </a></div>
                @endadmin

                @if ($orders->status == 'Accepted' || $orders->status == 'Estimated')
                    <button class="modal-open noprint w-3/4 float-right inline-flex items-center m-auto mt-1 py-2 px-3  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2">
                        @if ($orders->status == 'Estimated')
                            Accepted
                        @elseif ($orders->status == 'Accepted')
                            Completed
                        @endif
                    </button>

                    <!--Modal-->
                    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                            <span class="text-sm">(Esc)</span>
                        </div>

                        <!-- Add margin if you want to see some of the overlay behind the modal-->
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                @if ($orders->status == 'Estimated')
                                <p class="text-2xl font-bold">Accept Order?</p>
                                @elseif($orders->status == 'Accepted')
                                <p class="text-2xl font-bold">Trim Usage and Waste</p>
                                @endif

                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </div>
                            </div>

                            <!--Body-->
                            @if ($orders->status == 'Estimated')

                            <p>Please confirm that this order has been accepted by the customer.</p>

                            <div class="flex float-right col-span-3 col-start-3 my-6 pt-2">
                                <div class="px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2"><a class="m-auto" href="{{ route('advance', ['Accepted']) }}"> Confirm </a></div>
                                <button class="modal-close px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Cancel</button>
                            </div>

                            @elseif($orders->status == 'Accepted')
                                <form action="{{ route('accept') }}" method="POST" class="grid grid-cols-5">
                                    @csrf
                                    <label for="trimUsage" class=" mx-auto col-span-2 col-start-2">ft.</label>
                                    <label for="trimUsage" class=" mx-auto col-span-2 col-start-4">in.</label>

                                    @foreach ($sn as $roll)

                                    <label for="tft" class=" font-bold text-right col-start-1 mt-3 mr-2 float-right my-auto">{{ $roll->sn }}</label>


                                    <label for="tft" class=" text-right col-start-1 mr-2 float-right my-auto">Trim</label>
                                    <input type="text" name="tft[{{ $roll->sn }}]" class="m-1 col-start-2 col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="text" name="tin[{{ $roll->sn }}]" class="m-1 col-start-4 col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <label for="wft" class=" text-right col-start-1 mr-2 float-right my-auto">Waste</label>
                                    <input type="text" name="wft[{{ $roll->sn }}]" class="m-1 mb-3 col-start-2 col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="text" name="win[{{ $roll->sn }}]" class="m-1 mb-3 col-start-4 col-span-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    @endforeach


                                    <div class="flex col-span-3 col-start-3 mt-6 pt-2">
                                        <button type="submit" class="px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">Submit</button>
                                        <button class="modal-close px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Cancel</button>
                                    </div>
                                </form>
                            @endif
                            <!--Footer-->


                        </div>
                        </div>
                    </div>

                @else
                    <div class=" noprint w-3/4 float-right inline-flex items-center m-auto mt-1 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150  my-2">

                        {{-- {{ dd($orders->status) }} --}}
                        @switch($orders->status)
                            @case('Started')
                            <a class="m-auto" href="{{ route('advance', ['Estimated']) }}"> Continue </a>
                                @break
                            @case('Estimated')
                            <a class="m-auto" href="{{ route('advance', ['Accepted']) }}"> Accepted </a>
                                @break
                            @case('Completed')
                            <a class="m-auto" href="{{ route('advance', ['Invoiced']) }}"> Invoiced </a>
                                @break
                            @case('Invoiced')
                            <a class="m-auto" href="{{ route('advance', ['Delivered']) }}"> Delivered </a>
                                @break
                            @case('Delivered')
                                @admin
                                    <a class="m-auto" href="{{ route('advance', ['Finalized']) }}"> Finalize </a>
                                        @break
                                @endadmin
                        @endswitch
                    </div>
                @endif

            </div>
        </div>
        {{-- Display section for panel orders --}}
        <div class="border-purple-400 border-t border-b  pr-6"><h2 class="inline text-lg">Panels</h2><svg class="inline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
            <div id="panelWindow" class="">
                <div class="grid gap-3 grid-cols-10 font-bold py-1">
                    <div class="col-start-1 col-span-3 my-auto">Roll Number - Color - Gauge</div>
                    <div class="col-start-4 col-span-2 my-auto">Item Description</div>
                    <div class="col-start-6  my-auto">Length (ft)</div>
                    <div class="col-start-7 my-auto">(in)</div>
                    <div class="col-start-8 my-auto">Quantity</div>
                    <div class="col-start-9 my-auto">$/unit</div>
                    <div class="col-start-10 my-auto">Total</div>

                </div>
                @foreach ($order as $panel)

                    @if ($panel->category == 'Panels')
                        <div class="grid gap-3 grid-cols-10 border-purple-200 border-b py-1">
                            <div class="col-start-1 col-span-3 my-auto">{{ $panel->sn }} - {{ $panel->color }} - {{ $panel->gauge }} Gauge</div>
                            <div class="col-start-4 col-span-2 my-auto">{{ $panel->desc }}</div>
                            <div class="col-start-6  my-auto">{{ $panel->ft }}'</div>
                            <div class="col-start-7 my-auto">{{ $panel->in }}"</div>
                            <div class="col-start-8 my-auto">{{ $panel->quantity }}</div>
                            <div class="col-start-9 my-auto">$ {{ $panel->ppu }}</div>
                            <div class="col-start-10 my-auto">$ {{ $panel->total }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        {{-- Dipsplay section for trim pieces --}}
            <div class="border-purple-400 border-t border-b  pr-6"><h2 class="inline text-lg">Trim</h2><svg class="inline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
                <div id="panelWindow" class="">
                    <div class="grid gap-3 grid-cols-10 font-bold py-1">
                        <div class="col-start-1 col-span-3 my-auto">Roll Number - Color - Gauge</div>
                        <div class="col-start-4 col-span-4 my-auto">Item Description</div>
                        <div class="col-start-8 my-auto">Quantity</div>
                        <div class="col-start-9 my-auto">$/unit</div>
                        <div class="col-start-10 my-auto">Total</div>

                    </div>
            @foreach ($order as $piece)
                @if ($piece->category == 'Trim')
                    <div class="grid gap-3 grid-cols-10 border-purple-200 border-b py-1">
                        <div class="col-start-1 col-span-3 my-auto">{{ $piece->sn }} - {{ $piece->color }} - {{ $piece->gauge }} Gauge</div>
                        <div class="col-start-4 col-span-4 my-auto">{{ $piece->desc }}</div>
                        <div class="col-start-8 my-auto">{{ $piece->quantity }}</div>
                        <div class="col-start-9 my-auto">$ {{ $piece->ppu }}</div>
                        <div class="col-start-10 my-auto">$ {{ $piece->total }}</div>
                    </div>
                @endif
            @endforeach

            </div>

        {{-- Display section for all other items --}}

        <div class="border-purple-400 border-t border-b  pr-6"><h2 class="inline text-lg">Other</h2><svg class="inline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
            <div id="panelWindow" class="p-2">
                <div class="grid gap-3 grid-cols-10 font-bold py-1">
                    <div class="col-start-1 col-span-3 my-auto">Category</div>
                    <div class="col-start-4 col-span-4 my-auto">Item Description</div>
                    <div class="col-start-8 my-auto">Quantity</div>
                    <div class="col-start-9 my-auto">$/unit</div>
                    <div class="col-start-10 my-auto"></div>
                </div>
                @foreach ($order as $piece)
                    @if ($piece->category != 'Panels' && $piece->category != 'Trim')
                        <div class="grid gap-3 grid-cols-10 border-purple-200 border-b py-1">
                            <div class="col-start-1 col-span-3 my-auto">{{ $piece->category }}</div>
                            <div class="col-start-4 col-span-2 my-auto">{{ $piece->desc }}</div>
                            <div class="col-start-8 my-auto">{{ $piece->quantity }}</div>
                            <div class="col-start-9 my-auto">$ {{ $piece->ppu }}</div>
                            <div class="col-start-10 my-auto">$ {{ $piece->total }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="grid grid-cols-11 gap-3">
                <div class="grid grid-cols-1 pl-2 col-start-8 border-purple-200 border-l">
                    <div class="row-start-1 font-bold">Subtotal:</div>
                    <div class="row-start-2 whitespace-nowrap font-bold border-b border-purple-400 pr-2">Sales Tax: (8.5%)</div>
                    <div class="row-start-3 font-bold">Total:</div>
                </div>
                <div class="grid grid-cols-1 col-start-11">
                    <div class="row-start-1">$ {{ $sub }}</div>
                    <div class="row-start-2 border-b border-purple-400 ">$ {{ round($sub * .085, 2) }}</div>
                    <div class="row-start-3">$ {{ round($sub * 1.085, 2) }}</div>
                </div>
            </div>

    </div>

    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
          openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            toggleModal()
          })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
          closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
          evt = evt || window.event
          var isEscape = false
          if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
          } else {
            isEscape = (evt.keyCode === 27)
          }
          if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
          }
        };


        function toggleModal () {
          const body = document.querySelector('body')
          const modal = document.querySelector('.modal')
          modal.classList.toggle('opacity-0')
          modal.classList.toggle('pointer-events-none')
          body.classList.toggle('modal-active')
        }


    </script>

@endsection
