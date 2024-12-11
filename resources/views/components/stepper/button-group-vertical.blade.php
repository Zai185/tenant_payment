<div {{$attributes->only('class')->merge(['class'=>"flex flex-col"])}}>

    <div>
        @if (isset($next))
        <x-button class="{{$attributes['btn_class']}}" @click="{{$next}}">{{$nextText ?? "Next"}}</x-button>
        @endif
    </div>

    <div>
        @if (isset($back))
        <x-button class="{{$attributes['btn_class']}}" @click="{{$back}}">{{$backText ?? "Back"}}</x-button>
        @endif
    </div>

</div>