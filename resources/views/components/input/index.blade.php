<div class="{{$attributes['layout-class']}}">
    @if (isset($label))
    <label class="text-xs text-gray-700 font-bold px-2">{{$label}}</label>
    @endif

    <input
        {{$attributes->merge(
    ['class'=>"w-full bg-white peer flex rounded-md border px-3 py-2 text-sm outline-none placeholder:text-neutral-text autofill:shadow-[inset_0_0_0px_1000px_hsl(var(--surface))] autofill:[-webkit-text-fill-color:hsl(hsl(--main-text))_!important] focus-visible:border-input-border focus-visible:outline-none focus-visible:ring-1"])}}>

    @if (isset($hasError))
    <x-input.error error="{{$attributes['wire:model']}}" />
    @endif
</div>