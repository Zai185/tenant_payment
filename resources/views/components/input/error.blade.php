@error($error)
<span {{$attributes->class(['text-sm text-red-700']) }}>
    {{ $message}}
</span>
@enderror