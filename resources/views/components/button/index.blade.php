<button
    type="button"
    {{$attributes->merge(["class"=>"block min-w-20 py-2 items-center justify-center gap-1 rounded-md bg-primary px-3 text-sm text-primary-text transition-colors duration-150 hover:bg-primary/90 active:brightness-95"])->except("type")}} type="{{$type ?? "button"}}">
    {{$slot}}
</button>