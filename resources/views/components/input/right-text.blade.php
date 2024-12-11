<div>
    @if (isset($label))
    <label class="text-xs text-gray-700 h-full font-bold px-2">{{$label}}</label>
    @endif
    <div class="border rounded-lg flex">
        <div class="flex-1 h-full">
            <x-input {{$attributes->except('label')}} />
        </div>
        <div class="flex justify-center items-center px-2 transform h-[38px] text-sm bg-blue-100">
            {{$text}}
        </div>
    </div>
</div>