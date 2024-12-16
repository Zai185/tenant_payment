<div class="relative w-80">
    <div class="absolute border-r pe-1 left-2 top-1/2 -translate-y-1/2 transform">
        {{$slot}}
    </div>

    <input
        {{$attributes->merge(
    ['class'=>"w-full bg-white peer flex rounded-md border ps-10 pe-3 py-2 text-sm outline-none placeholder:text-neutral-text autofill:shadow-[inset_0_0_0px_1000px_hsl(var(--surface))] autofill:[-webkit-text-fill-color:hsl(hsl(--main-text))_!important] focus-visible:border-input-border focus-visible:outline-none focus-visible:ring-1"])}}>
</div>