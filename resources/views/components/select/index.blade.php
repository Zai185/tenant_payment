<div>
    @if (isset($label))
    <label class="text-xs text-gray-700 font-bold px-2">{{$label}}</label>
    @endif
    <select {{$attributes->merge(
    ['class'=>"w-full peer flex rounded-md border bg-white px-3 py-2 text-base outline-none placeholder:text-neutral-text autofill:shadow-[inset_0_0_0px_1000px_hsl(var(--surface))] autofill:[-webkit-text-fill-color:hsl(hsl(--main-text))_!important] focus-visible:border-input-border focus-visible:outline-none focus-visible:ring-1"])->only(['class', 'wire:model'])}}>
        <option value="" disabled selected>Select your business type</option>

        @foreach ($options as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach

        {{$slot}}
    </select>
</div>