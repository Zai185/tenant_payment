<div class="{{$attributes->get('layout-class')}} relative">
    <div class="relative">
        <input
            {{$attributes->merge(
    ['class'=>"w-full peer flex h-10 w-full rounded-md border bg-white px-3 py-2 text-sm outline-none placeholder:text-muted-text autofill:shadow-[inset_0_0_0px_1000px_rgb(hsl(--surface))] autofill:[-webkit-text-fill-color:rgb(hsl(--main-text))_!important] focus-visible:border-input-border focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"])->except('placeholder')}} placeholder="">
        <label
            class="pointer-events-none absolute start-2 top-2 z-10 max-w-fit origin-[0] -translate-y-4 scale-75 transform cursor-text  px-2 text-sm text-muted-text duration-300 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:start-2 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75  peer-focus:px-2 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 bg-white peer-focus:bg-white"
            for="example-5">
            {{$attributes['placeholder']}}
        </label>
    </div>

    @if (isset($hasError))
    <x-input.error error="{{$attributes['wire:model']}}" />
    @endif
</div>