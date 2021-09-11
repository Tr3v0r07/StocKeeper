

<div class="grid grid-cols-5 m-auto">
        <div class="col-start-2">Roll Number</div>
        <div class="col-start-3">Color</div>
        <div class="col-start-4">Remaining</div>
    @foreach ($rolls as $roll)

            <div class="col-start-2">{{ $roll->sn }}</div>
            <div class="col-start-3">{{ $roll->color }}</div>
            <div class="col-start-4">{{ ($roll->remaining - ($roll->remaining % 12))/12 }}' {{ $roll->remaining % 12 }}"</div>

    @endforeach

</div>



                    {{-- <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
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
                            <p class="text-2xl font-bold">Trim Usage and Waste</p>
                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </div>
                            </div>

                            <!--Body-->
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
                            <!--Footer-->


                        </div>
                        </div>
                    </div> --}}
