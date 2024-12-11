<div {{$attributes->merge(['class'=>"flex w-full max-w-xl flex-col items-center justify-center gap-2 "])->only('class')}}>
  @foreach ($steps as $index => $step)
  <div class="flex gap-2" wire:key="$index">

    <div class="flex w-fit flex-col items-center gap-2 ">
      <button
        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full border text-sm"
        x-bind:class="step > {{$index + 1}}
        ? 'border-main-text bg-main-text text-main'
        : step == {{$index + 1}}
          ? 'border-main-text bg-surface'
          : 'text-muted-text'">
        {{$index + 1}}
      </button>
      @if (count($steps) != $index + 1)
      <div class=" min-h-8 h-full w-px bg-main-text ">
      </div>
      @endif
    </div>
    <p class="text-sm text-muted-text">{{$step['description']}}</p>
  </div>
  @endforeach
  </>