<div class="flex {{isset($spaceBetween) ? 'justify-between' : 'gap-2'}}">
    <div>

        @if (isset($back))
        <x-button {{$attributes->only('class')}}  @click="{{$back}}">{{$backText ?? "Back"}}</x-button>
        @endif
    </div>

    <div>

        @if (isset($next))
        <x-button {{$attributes->only('class')}} @click="{{$next}}">{{$nextText ?? "Next"}}</x-button>
        @endif
    </div>

</div>