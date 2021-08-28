<script>
    $(function () {
       
       $('#individual').on("click", function () {
           $ind = $('#individual').val();

           if($ind) {
               $('#contact').css('display','block');
               $('#contactLabel').css('display','block');
           }
           if($ind == false) {
               $('#contact').css('display','hidden');
               $('#contactLabel').css('display','hidden');
           };

       });
        
    });
</script>
    
    <form method="POST" action="{{ route('add') }}" class='grid grid-cols-4 gap-x-3 p-2.5'>
        @csrf
        <x-label for="name" :value="__('Customer Name')" class="col-span-3"></x-label>
        <x-label for="individual" :value="__('Business?')"></x-label>

        <x-input id="name" placeholder="Individual or Business Name" class="block mt-1 col-span-3" type="text" name="name" :value="old('name')" required autofocus />
        <input id="individual" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" name="individual" :value="old('individual')"/>

        <x-label id="contactLabel" for="contact" class="col-span-3 mt-2" :value="__('Contact Name')" style="display: none"></x-label>
        <x-input id="contact" placeholder="Contact for Business Customers" class="mt-1 col-span-3" type="text" name="contact" :value="old('contact')" style="display: none"/>

        <x-label for="phone" class="col-span-3 mt-2" :value="__('Phone Number')"></x-label>
        <x-input id="phone" placeholder="Phone Number" class="block mt-1 col-span-3" type="text" name="phone" :value="old('phone')" required/>

        <x-label for="email" class="col-span-3 mt-2" :value="__('Email Address')"></x-label>
        <x-input id="email" placeholder="Email Address" class="block mt-1 col-span-3" type="text" name="email" :value="old('email')" required/>

        <x-label for="street_1" class="col-span-3 mt-2" :value="__('Address 1')"></x-label>
        <x-input id="street_1" placeholder="Street Address" class="block mt-1 col-span-3" type="text" name="street_1" :value="old('street_1')" required/>

        <x-label for="street_2" class="col-span-3 mt-2" :value="__('Address 2 (Optional)')"></x-label>
        <x-input id="street_2" placeholder="Optional" class="block mt-1 col-span-3" type="text" name="street_2" :value="old('street_2')" />

        <x-label for="city" class="col-span-2 mt-2" :value="__('City')"></x-label>
        <x-label for="state" class="mt-2" :value="__('State')"></x-label>
        <x-label for="zip" class="mt-2" :value="__('Zip')"></x-label>
        
        <x-input id="city" placeholder="City" class="block mt-1 col-span-2" type="text" name="city" :value="old('city')" required/>
        <select id="state" placeholder="Select" class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="select" name="state" :value="old('state')" required>
            @foreach ($states as $state)
                <option value={{ $state->code }}>{{ $state->code }}</option>
            @endforeach
        </select>
        <x-input id="zip" placeholder="zip" class="block mt-1 " type="text" name="zip" :value="old('zip')" required/>
        <x-button class="mt-3 w-5/6 justify-center m-auto">
            {{ __('Enter') }}
        </x-button>

    </form>
