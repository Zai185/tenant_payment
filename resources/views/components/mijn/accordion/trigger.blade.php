<h3 class="flex" @click="accordionOpen = !accordionOpen">
    <button
        type="button"
        class="group flex w-full items-center justify-between py-3">
        {{$slot}}
        <x-icons.arrow-down />
    </button>
</h3>