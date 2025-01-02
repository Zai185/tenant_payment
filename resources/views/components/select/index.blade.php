<div x-data="{modelOpen: false}" class="relative">

    <div class="mt-2 w-full " @blur="modelOpen = false" >

        @if (isset($label))
        <label class="text-xs text-gray-700 dark:text-primary-dark-text font-bold px-2">
            {{$label}}
        </label>
        @endif

        <input type="hidden" {{$attributes->except(['text', 'default-text'])}}>

        <button @click="modelOpen = !modelOpen" type="button" class="grid w-full grid-cols-1 rounded-md bg-white py-1.5 pl-3 pr-2 text-left text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" x-ref="btn">
            <span class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                <span class="block truncate">{{$text ?: $defaultText}}</span>
            </span>
            <svg class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
            </svg>
        </button>

        <ul x-show="modelOpen" @click="modelOpen=false" @click.outside="modelOpen = false" class="absolute z-[100] mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3" >
            {{$slot}}
        </ul>
    </div>
</div>