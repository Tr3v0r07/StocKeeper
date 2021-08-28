<form action="{{ route('category') }}">
    <x-label for="category" :value="__('Category')" class="mt-2"></x-label>
    <select name="category" onchange="this.form.submit()" id="category" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"">
        @if (isset($curcat))
            @if ($curcat == "")
                <option selected value="">All</option>
            @else
                <option value="">All</option>
            @endif    
            @if ($curcat == 'fastners')
                <option selected value="fastners">Fastners</option>
            @else
                <option value="fastners">Fastners</option>
            @endif
            @if ($curcat == 'boots')
                <option selected value="boots">Boots</option>
            @else
                <option value="boots">Boots</option>
            @endif
            @if ($curcat == 'misc')
                <option selected value="misc">Miscellaneous</option>
            @else
                <option value="misc">Miscellaneous</option>
            @endif
            @if ($curcat == 'trim')
                <option selected value="trim">Trim</option>
            @else
                <option value="trim">Trim</option>
            @endif
            @if ($curcat == 'panels')
                <option selected value="panels">Panels</option>
            @else
                <option value="panels">Panels</option>
            @endif
        @else
            <option selected value="">All</option>
            <option value="fastners">Fastners</option>
            <option value="boots">Boots</option>
            <option value="misc">Miscellaneous</option>
            <option value="trim">Trim</option>
            <option value="panels">Panels</option>
        @endif    
    </select>
</form>