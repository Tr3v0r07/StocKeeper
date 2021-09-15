@extends('inventory.inventory')

@section('new-inv')
<div class=" p-3 bg-white rounded shadow ">

<form action="{{ route('store') }}">
    <div class="grid grid-cols-4 auto-cols-auto gap-3 mt-4">
        <x-label for="category" :value="__('Category*')" class="mt-2 col-span-1"></x-label>
        <x-label for="desc" :value="__('Item Description')" class="mt-2 col-span-3"></x-label>
        <select required name="category" id="category" class=" row-start-2 col-span-1 block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option disabled selected>Select Category</option>
            <option value="Fastners">Fastners</option>
            <option value="Boots">Boots</option>
            <option value="Misc">Miscellaneous</option>
            <option value="Trim">Trim</option>
            <option value="Panels">Panels</option>
        </select>
        <x-input name="desc" placeholder="Item Description" class="col-span-3 row-start-2 " type="text" :value="old('desc')"/>
        <x-label for="quantity" :value="__('Quantity')" class="mt-2 row-start-3 col-start-1"></x-label>
        <x-label for="low" :value="__('Low Inventory Mark')" class="mt-2 row-start-3 col-start-2"></x-label>
        <x-label for="ppu" :value="__('Default Price/Unit*')" class="mt-2 row-start-3 col-start-3"></x-label>
        <x-input id="quantity" placeholder="Quantity" class="col-start-1 row-start-4" type="text" name="quantity" :value="old('quantity')" />
        <x-input id="low" placeholder="Low Inventory Mark" class="col-start-2 row-start-4" type="text" name="low" :value="old('low')" />
        <x-input id="ppu" placeholder="Price/Unit" class="col-start-3 row-start-4" type="text" name="ppu" :value="old('ppu')" />
        <button type="submit" class=" m-auto justify-center row-start-5 col-start-4 inline-flex px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">Add</button>
    </div>
</form>
</div>
@endsection
