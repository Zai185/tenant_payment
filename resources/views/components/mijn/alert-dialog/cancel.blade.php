<button @click="dialogOpen = false"
    type="button"
    class="inline-flex items-center justify-center gap-1 transition-colors duration-150 active:brightness-90 text-sm hover:bg-accent hover:text-accent-text rounded-md h-10 px-3">
    {{$slot}}
</button>