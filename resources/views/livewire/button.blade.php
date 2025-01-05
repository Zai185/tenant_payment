@props(['intent', 'size'])

<button class="{{$className}}">
    {{$slot}} {{$intent}}
</button>