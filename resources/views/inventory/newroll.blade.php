@extends('inventory.inventory')

@section('new-roll')
@include('inventory.roll-query')
<div class=" p-6 mt-2 bg-white rounded shadow ">
    <form action="{{ route('roll-store') }}" class="grid gap-3 grid-cols-5 m-auto">
        <x-label for="sn" :value="__('Roll Number')" class="mt-2 row-start-1 col-start-1"></x-label>
        <x-label for="color" :value="__('Color')" class="mt-2 row-start-1 col-start-2"></x-label>
        <x-label for="gauge" :value="__('Gauge')" class="mt-2 row-start-1 col-start-3"></x-label>
        <x-label for="length" :value="__('Length')" class="mt-2 row-start-1 col-start-4"></x-label>
        <x-input id="sn" placeholder="Roll Number" class="row-start-2 col-start-1" type="text" name="sn" required :value="old('sn')" />
        <select name="color" id="color" class="row-start-2 col-start-2 block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option readonly selected value="">Select Color</option>
            @foreach ($colors as $color)
                <option value="{{ $color->name }}">{{ $color->name }}</option>
            @endforeach
        </select>
        <select name="gauge" id="gauge" class="row-start-2 col-start-3 block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option readonly selected value="">Select Gauge</option>
            <option value="26">26 gauge</option>
            <option value="29">29 gauge</option>
        </select>
        <x-input id="length" placeholder="Length" class="row-start-2 col-start-4" type="text" name="length" required :value="old('length')" />
        <x-input id="remaining" class="hidden" type="text" name="remaining" value="4300" />
        <button type="submit" class=" m-auto justify-center row-start-3 col-start-5 inline-flex px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">Add</button>
    </form>
</div>
@endsection
