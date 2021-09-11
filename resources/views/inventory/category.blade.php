<form action="{{ route('category') }}">
    <x-label for="category" :value="__('Category')" class="mt-2"></x-label>
    <select name="category" onchange="this.form.submit()" id="category" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"">
        @if (isset($curcat))
            @if ($curcat == "")
                <option selected value="">All</option>
            @else
                <option value="">All</option>
            @endif
            @if ($curcat == 'Fastners')
                <option selected value="Fastners">Fastners</option>
            @else
                <option value="Fastners">Fastners</option>
            @endif
            @if ($curcat == 'Boots')
                <option selected value="Boots">Boots</option>
            @else
                <option value="Boots">Boots</option>
            @endif
            @if ($curcat == 'Misc')
                <option selected value="Misc">Miscellaneous</option>
            @else
                <option value="Misc">Miscellaneous</option>
            @endif
            @if ($curcat == 'Trim')
                <option selected value="Trim">Trim</option>
            @else
                <option value="Trim">Trim</option>
            @endif
            @if ($curcat == 'Panels')
                <option selected value="Panels">Panels</option>
            @else
                <option value="Panels">Panels</option>
            @endif
        @else
            <option selected value="">All</option>
            <option value="Fastners">Fastners</option>
            <option value="Boots">Boots</option>
            <option value="Misc">Miscellaneous</option>
            <option value="Trim">Trim</option>
            <option value="Panels">Panels</option>
        @endif
    </select>
</form>
