<div class="grid grid-cols-5 m-auto">
        <div class="col-start-2">Roll Number</div>
        <div class="col-start-3">Color</div>
        <div class="col-start-4">Remaining</div>
    @foreach ($rolls as $roll)
        <div class="col-start-2">{{ $roll->sn }}</div>
        <div class="col-start-3">{{ $roll->color }}</div>
        <div class="col-start-4">{{ ($roll->length - ($roll->length % 12))/12 }}' {{ $roll->length % 12 }}"</div>
    @endforeach

</div>